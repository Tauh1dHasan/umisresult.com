<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\District;
use App\Models\Division;

class DistrictController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_district', $user)){
            $query = District::orderBy('sl','ASC');
            if (isset($request->division) and $request->division != '') {
                $query->where('division_id',$request->division);
            }
            if (isset($request->name) and $request->name != '') {
                $query->where('name','like','%'.$request->name.'%');
            }
            $districts = $query->paginate(20);
            $regions = Division::where('status',1)->latest()->get();
            return view('backend.admin.district.index', compact("districts","regions"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_district', $user)){
            $validated = $request->validate([
                'name' => 'required|unique:districts',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            District::create($data);
            return back()->with('success', 'নতুন জেলা সংযুক্ত করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_district', $user)){
            $district = District::findOrFail($id);
            $menu_expand = route('admin.district.index');
            return view('backend.admin.district.view', compact("district","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_district', $user)){
            $request->validate([
                'name' => 'required|unique:districts,name,' . $id,
            ]);
            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            District::find($id)->update($data);
            return back()->with('success', 'জেলা আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_district', $user)){
            District::find($id)->delete();
            return back()->with('success', 'জেলা মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
