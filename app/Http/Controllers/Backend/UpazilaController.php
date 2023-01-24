<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\Upazila;
use App\Models\District;
use App\Models\Division;

class UpazilaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_upazila', $user)){
            $query = Upazila::orderBy('sl','ASC');
            if (isset($request->division) and $request->division != '') {
                $query->whereHas('districtInfo',function($new_query) use ($request){
                    $new_query->where('division_id',$request->division);
                });
            }

            if (isset($request->name) and $request->name != '') {
                $query->where('name','like','%'.$request->name.'%');
            }
            $upazilas = $query->with('districtInfo.divisionInfo')->paginate(20);
            $regions = Division::where('status',1)->latest()->get();
            $districts = District::where('status',1)->with('divisionInfo')->latest()->get();

            return view('backend.admin.upazila.index', compact("upazilas","regions","districts"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_upazila', $user)){
            $validated = $request->validate([
                'name' => 'required|unique:upazilas',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            Upazila::create($data);

            return back()->with('success', 'নতুন উপজেলা সফলভাবে যুক্ত হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_upazila', $user)){
            $upazila = Upazila::findOrFail($id);
            $menu_expand = route('admin.upazila.index');
            return view('backend.admin.upazila.view', compact("upazila","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_upazila', $user)){
            $request->validate([
                'name' => 'required|unique:upazilas,name,' . $id,
            ]);

            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            Upazila::find($id)->update($data);

            return back()->with('success', 'উপজেলা সফলভাবে আপডেট হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_upazila', $user)){
            Upazila::find($id)->delete();
            return back()->with('success', 'নতুন উপজেলা সফলভাবে মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
