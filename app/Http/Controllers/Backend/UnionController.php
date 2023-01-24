<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\Union;
use App\Models\Division;
use App\Models\Upazila;

class UnionController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_union', $user)){
            $query = Union::orderBy('sl','ASC');
            if (isset($request->upazila) and $request->upazila != '') {
                $new_query->where('upazila_id',$request->upazila);
            }

            if (isset($request->region) and $request->region != '') {
                $query->whereHas('upazilaInfo',function($new_query) use ($request){
                    $query->whereHas('districtInfo',function($new_new_query) use ($request){
                        $new_new_query->where('division_id',$request->region);
                    });
                });
            }

            if (isset($request->name) and $request->name != '') {
                $query->where('name','like','%'.$request->name.'%');
            }

            $unions = $query->with('upazilaInfo.districtInfo.divisionInfo')->paginate(20);
            $regions = Division::where('status',1)->latest()->get();
            $upazilas = Upazila::where('status',1)->latest()->get();

            return view('backend.admin.union.index', compact("unions","regions","upazilas"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('add_union', $user)){
            $upazilas = Upazila::where('status',1)->latest()->get();
            $menu_expand = route('admin.union.index');
            return view('backend.admin.union.create', compact("upazilas","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_union', $user)){
            $validated = $request->validate([
                'name' => 'required|unique:unions',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;

            Union::create($data);

            return redirect()->route('admin.union.index')->with('success', 'নতুন ইউনিয়ন সফলভাবে যোগ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_union', $user)){
            $union = Union::findOrFail($id);
            $menu_expand = route('admin.union.index');
            return view('backend.admin.union.view', compact("union","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function edit($id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_union', $user)){
            $union = Union::findOrFail($id);
            $upazilas = Upazila::where('status',1)->latest()->get();
            $menu_expand = route('admin.union.index');
            return view('backend.admin.union.edit', compact("union","menu_expand","upazilas"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_union', $user)){
            $request->validate([
                'name' => 'required|unique:unions,name,' . $id,
            ]);

            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            Union::find($id)->update($data);

            return redirect()->route('admin.union.index')->with('success', 'ইউনিয়ন সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_union', $user)){
            Union::find($id)->delete();
            return back()->with('success', 'ইউনিয়ন সফলভাবে মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
