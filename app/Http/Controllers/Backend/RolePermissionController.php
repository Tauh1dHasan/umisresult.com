<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;

use Auth;
use App\Models\Role;
use App\Models\RolePermission;
use App\Models\Permission;

class RolePermissionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('assign_permission_list', $user)){

            if(Session::has('selected_role_id')){
                $selected_role_id = Session::get('selected_role_id');
                $selected_role = Role::where('id', $selected_role_id)->first();
            }else{
                $selected_role = '';
                $selected_role_id = Auth::user()->role_id;
            }

            // only super admin will see all roles
            if($user->role_id == 1){
                $roles = Role::where('status', 1)->get();
            }else{
                $roles = Role::where('id', '!=', 1)->where('status', 1)->get();
            }
            $rolePermissions = RolePermission::with('permissionName')->where('role_id', $selected_role_id)->get();

            $assignedIds = array();
            foreach($rolePermissions as $rp){
                array_push($assignedIds, $rp->permission_id);
            }
            $unassignedPermissions = Permission::whereNotIn('id', $assignedIds)->get();
            return view('backend.admin.rolePermission.index', compact('roles', 'rolePermissions', 'unassignedPermissions', 'selected_role', 'selected_role_id'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function showPermission($roleId)
    {
        $user = Auth::user();
        if(Gate::allows('assign_permission_list', $user)){
            // only super admin will see all roles
            if($user->role_id == 1){
                $roles = Role::where('status', 1)->get();
            }else{
                $roles = Role::where('id', '!=', 1)->where('status', 1)->get();
            }
            $rolePermissions = RolePermission::with('permissionName')->where('role_id', $roleId)->get();
            $assignedIds = array();
            foreach($rolePermissions as $rp){
                array_push($assignedIds, $rp->permission_id);
            }
            $unassignedPermissions = Permission::whereNotIn('id', $assignedIds)->get();
            return response()->json([
                'roles' => $roles,
                'rolePermissions' => $rolePermissions,
                'unassignedPermissions' => $unassignedPermissions,
            ]);
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function removePermission(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('remove_assign_permission', $user)){
            if(!$request->removePermission){
                return redirect()->route('admin.rolePermission.index')->with('error', 'অনুগ্রহ করে প্রথমে অনুমতি/গুলি নির্বাচন করুন..!');
            }else{
                $permissionsToRemove = RolePermission::where('role_id', $request->hiddenRoleId)->whereIn('permission_id', $request->removePermission)->delete();
                return redirect()->route('admin.rolePermission.index')->with('selected_role_id', $request->hiddenRoleId)->with('success', 'অনুমতিগুলি সফলভাবে সরানো হয়েছে..!');
            }
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function givePermission(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('assign_permission', $user)){
            if(!$request->givePermission){
                return redirect()->route('admin.rolePermission.index')->with('error', 'অনুগ্রহ করে প্রথমে অনুমতি/গুলি নির্বাচন করুন..!');
            }else{
                foreach($request->givePermission as $permission)
                {
                    $permissionsToGive = new RolePermission;
                    $permissionsToGive->permission_id = $permission;
                    $permissionsToGive->role_id = $request->hiddenRoleId;
                    $permissionsToGive->created_by = Auth::user()->id;
                    $permissionsToGive->save();
                }
                return redirect()->route('admin.rolePermission.index')->with('selected_role_id', $request->hiddenRoleId)->with('success', 'অনুমতি সফলভাবে দেওয়া হয়েছে..!');
            }
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
