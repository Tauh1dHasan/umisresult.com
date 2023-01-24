<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\Village;
use App\Models\Division;
use App\Models\Block;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_village', $user)){
            $query = Village::orderBy('sl','ASC');
            if (isset($request->block) and $request->block != '') {
                $new_query->where('block_id',$request->block);
            }

            if (isset($request->region) and $request->region != '') {
                $query->whereHas('blockInfo',function($new_query) use ($request){
                    $query->whereHas('unionInfo',function($new_query) use ($request){
                        $query->whereHas('upazilaInfo',function($new_query) use ($request){
                            $query->whereHas('districtInfo',function($new_new_query) use ($request){
                                $new_new_query->where('division_id',$request->region);
                            });
                        });
                    });
                });
            }

            if (isset($request->name) and $request->name != '') {
                $query->where('name','like','%'.$request->name.'%');
            }

            $villages = $query->with('blockInfo.unionInfo.upazilaInfo.districtInfo.divisionInfo')->paginate(20);
            $regions = Division::where('status',1)->latest()->get();
            $blocks = Block::where('status',1)->latest()->get();

            return view('backend.admin.village.index', compact("villages","regions","blocks"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('add_village', $user)){
            $blocks = Block::where('status',1)->latest()->get();
            $menu_expand = route('admin.village.index');
            return view('backend.admin.village.create', compact("blocks","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_village', $user)){
            $validated = $request->validate([
                'name' => 'required|unique:villages',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            Village::create($data);
            return redirect()->route('admin.village.index')->with('success', 'নতুন গ্রাম যোগ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_village', $user)){
            $village = Village::findOrFail($id);
            $menu_expand = route('admin.village.index');
            return view('backend.admin.village.view', compact("village","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function edit($id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_village', $user)){
            $village = Village::findOrFail($id);
            $blocks = Block::where('status',1)->latest()->get();
            $menu_expand = route('admin.village.index');
            return view('backend.admin.village.edit', compact("village","menu_expand","blocks"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_village', $user)){
            $request->validate([
                'name' => 'required|unique:villages,name,' . $id,
            ]);
            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            Village::find($id)->update($data);
            return redirect()->route('admin.village.index')->with('success', 'গ্রাম সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_village', $user)){
            Village::find($id)->delete();
            return back()->with('success', 'গ্রাম সফলভাবে মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
