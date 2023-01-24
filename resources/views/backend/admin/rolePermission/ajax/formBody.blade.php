<h5 class="text-center"> প্রদানকৃত পারমিশন সমূহ</h5>
<button class="btn btn-sm btn-success mb-2" id="selectAllAssigned">সব নির্বাচন করুন</button>
<button class="btn btn-sm btn-danger mb-2" id="removeAllAssigned">সব মুছে ফেলুন</button>
<form action="{{route('admin.rolePermission.removePermission')}}" method="POST" style=" border: 1px solid rgba(0, 0, 0, 0.319);">
    @csrf
    @foreach ($rolePermissions as $permission)
        <input type="hidden" name="hiddenRoleId" value="{{$permission->role_id}}">
    @endforeach
    <div id="assignedPermissionList" class="row card-body" style="overflow: hidden;">
        @php
            $i = 1;
        @endphp
        @foreach ($rolePermissions as $permission)
            <div class="bg-soft-success m-1 p-2 col-xxl-2" style="border:1px solid rgba(0, 0, 0, 0.319);">
                <input class="assignedPermissions" type="checkbox" name="removePermission[]" id="removePermission{{conver_to_bn_number($i)}}" value="{{$permission->permission_id}}">
                <label class="form-check-label" for="removePermission{{conver_to_bn_number($i)}}">
                    {{$permission->permissionName ? $permission->permissionName->name_en : "-"}}
                </label>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
    <div class="card-footer">
        @can('remove_assign_permission')
            <button type="submit" class="btn btn-danger">পারমিশন অপসারণ</button>
        @endcan
    </div>
</form>


<h5 class="text-center mt-5"> অপ্রদানকৃত পারমিশন সমূহ</h5>
<button class="btn btn-sm btn-success mb-2" id="selectAllUnassigned">সব নির্বাচন করুন</button>
<button class="btn btn-sm btn-danger mb-2" id="removeAllUnassigned">সব মুছে ফেলুন</button>
<form action="{{route('admin.rolePermission.givePermission')}}" method="POST" style=" border: 1px solid rgba(0, 0, 0, 0.319);">
    @csrf
        <input type="hidden" name="hiddenRoleId" value="{{$selected_role_id}}">
    <div id="unassignedPermissionList" class="row card-body" style="overflow: hidden">
        @php
            $i = 1;
        @endphp
        @foreach ($unassignedPermissions as $up)
            <div class="bg-soft-danger m-1 p-2 col-xxl-2" style="border:1px solid rgba(0, 0, 0, 0.319);">
                <input class="unassignedPermissions" type="checkbox" name="givePermission[]" id="givePermission{{conver_to_bn_number($i)}}" value="{{$up->id}}">
                <label class="form-check-label" for="givePermission{{conver_to_bn_number($i)}}">
                    {{$up->name_en ?? "-"}}
                </label>
            </div>
            @php
                $i++;
            @endphp
        @endforeach
    </div>
    <div class="card-footer">
        @can('assign_permission')
            <button type="submit" class="btn btn-success">পারমিশন প্রদান</button>
        @endcan
    </div>
</form>
