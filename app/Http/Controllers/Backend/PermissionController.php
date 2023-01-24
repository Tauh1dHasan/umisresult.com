<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Auth;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('all_permissions', $user)){
            $permissions = Permission::with('createdUser')->latest()->paginate(20);
            return view('backend.admin.permission.index', compact('permissions'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_permission', $user)){
            $permission = new Permission;
            $permission->name_en = strtolower(str_replace(' ', '_', $request->name_en));
            $permission->name_bn = strtolower(str_replace(' ', '_', $request->name_en));
            $permission->status = 1;
            $permission->created_by = Auth::user()->id;
            $permission->save();
            return redirect()->route('admin.permission.index')->with('success', 'নতুন অনুমতি সফলভাবে যোগ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_permission', $user)){
            $permission = Permission::where('id', $id)->first();
            $permission->name_en = strtolower(str_replace(' ', '_', $request->name_en));
            $permission->name_bn = strtolower(str_replace(' ', '_', $request->name_en));
            $permission->status = 1;
            $permission->created_by = Auth::user()->id;
            $permission->save();
            return redirect()->route('admin.permission.index')->with('success', 'অনুমতি সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function delete($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_permission', $user)){
            Permission::find($id)->delete();
            return back()->with('success', 'পারমিশন মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
    }
}
