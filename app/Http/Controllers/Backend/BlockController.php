<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

use App\Models\Block;
use App\Models\Division;
use App\Models\Union;

class BlockController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_block')){
            $query = Block::orderBy('sl','ASC');
            if (isset($request->union) and $request->union != '') {
                $new_query->where('union_id',$request->union);
            }

            if (isset($request->region) and $request->region != '') {
                $query->whereHas('unionInfo',function($new_query) use ($request){
                    $query->whereHas('upazilaInfo',function($new_query) use ($request){
                        $query->whereHas('districtInfo',function($new_new_query) use ($request){
                            $new_new_query->where('division_id',$request->region);
                        });
                    });
                });
            }

            if (isset($request->name) and $request->name != '') {
                $query->where('name','like','%'.$request->name.'%');
            }

            $blocks = $query->with('unionInfo.upazilaInfo.districtInfo.divisionInfo')->paginate(20);
            $regions = Division::where('status',1)->latest()->get();
            $unions = Union::where('status',1)->latest()->get();

            return view('backend.admin.block.index', compact("blocks","regions","unions"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function create()
    {
        $user = Auth::user();
        if(Gate::allows('add_block', $user)){
            $unions = Union::where('status',1)->latest()->get();
            $menu_expand = route('admin.block.index');
            return view('backend.admin.block.create', compact("unions","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_block', $user)){
            $validated = $request->validate([
                'name' => 'required|unique:blocks',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            Block::create($data);
            return redirect()->route('admin.block.index')->with('success', 'নতুন ব্লক সংযুক্ত হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_block', $user)){
            $block = Block::findOrFail($id);
            $menu_expand = route('admin.block.index');
            return view('backend.admin.block.view', compact("block","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function edit($id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_block', $user)){
            $block = Block::findOrFail($id);
            $unions = Union::where('status',1)->latest()->get();
            $menu_expand = route('admin.block.index');
            return view('backend.admin.block.edit', compact("block","menu_expand","unions"));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_block', $user)){
            $request->validate([
                'name' => 'required|unique:blocks,name,' . $id,
            ]);
            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            Block::find($id)->update($data);
            return redirect()->route('admin.block.index')->with('success', 'ব্লক আপডেট হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_block', $user)){
            Block::find($id)->delete();
            return back()->with('success', 'ব্লক মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
