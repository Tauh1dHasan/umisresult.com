<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;
use App\Models\Designation;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Office;
use App\Models\HorticultureCenter;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('user_management', $user)){
            $designations = Designation::where('status', 1)->get();
            if($user->role_id == 1){
                $roles = Role::where('status', 1)->get();
            }else{
                $roles = Role::where('id', '!=', 1)->where('status', 1)->get();
            }
            $users_query = User::latest();
            if (auth()->user()->role_id > 1) {
                $office_info = auth()->user()->office ?? '';
                
                if ($office_info) {
                    if ($office_info->head_office != 1) {
                        if ($office_info->horticulture_center_id > 0) {
                            $users_query->where('office_id',$office_info->id);
                        }else if ($office_info->upazila_id > 0) {
                            $users_query->where('office_id',$office_info->id);
                        } else if ($office_info->district_id > 0) {
                            $district_ids = $office_info->areaInfos('',$office_info->district_id)['upazila_ids_office_ids'];
                            $users_query->whereIn('office_id',$district_ids);
                        } else if($office_info->division_id > 0) {
                            $upazila_ids = $office_info->areaInfos($office_info->division_id,'')['districts_ids_office_ids'];
    
                            $users_query->whereIn('office_id',$upazila_ids);
                        }
                    }
                }
            }
            $users = $users_query->paginate(15);
            $divisions = Division::where('status', 1)->get();
            $districts = District::where('status', 1)->get();
            $upazilas = Upazila::where('status', 1)->get();
            $offices = Office::where('status', 1)->get();
            $horticultureCenteres = HorticultureCenter::where('status', 1)->get();
            return view('backend.admin.user.index', compact('users', 'roles', 'designations', 'divisions', 'districts', 'upazilas', 'offices', 'horticultureCenteres'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_user', $user)){
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'unique:users|email|required',
                'mobile' => 'required',
                'role_id' => 'required',
                'designation_id' => 'required',
                'address' => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id' => 'required',
                'office_id' => 'required',
                'password' => 'required|confirmed',
            ]);

            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->full_name = $request->first_name.' '.$request->last_name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->role_id = $request->role_id;
            $user->designation_id = $request->designation_id;
            $user->address = $request->address;
            $user->status = 1;
            $user->password = Hash::make($request->password);
            $user->division_id = $request->division_id;
            $user->district_id = $request->district_id;
            $user->upazila_id = $request->upazila_id;
            $user->office_id = $request->office_id;
            $user->horticulture_cente_id = $request->horticulture_center_id;
            $user->created_by = Auth::user()->id;

            if($request->image){
                // $imageName = time().'.'.$request->image->extension();
                // $user->image = $imageName;
                // $request->image->move(public_path('userImages'), $imageName);

                $cp = $request->file('image');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
                Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
                $user->image = $randomFileName;
            }

            $user->save();

            return redirect()->route('admin.user.index')->with('success', 'নতুন ব্যবহারকারী সফলভাবে যোগ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function edit($id)
    {
        $currentUser = Auth::user();
        if(Gate::allows('edit_user', $currentUser)){
            $user = User::findOrFail($id);
            $menu_expand = route('admin.user.index');
            $divisions = Division::where('status', 1)->get();
            $offices = Office::where('status', 1)->get();
            $designations = Designation::where('status', 1)->get();
            $role_query = Role::latest();
            if (auth()->user()->role_id != 1) {
                $role_query->where('id', '!=', 1);
            }
            $roles = $role_query->where('status', 1)->get();
            $horticultureCenteres = HorticultureCenter::where('status', 1)->get();
            return view('backend.admin.user.edit', compact('user', 'menu_expand', 'horticultureCenteres', 'divisions', 'offices', 'designations', 'roles'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function update(Request $request, $id)
    {
        $currentUser = Auth::user();
        if(Gate::allows('edit_user', $currentUser)){
            $this->validate($request, [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'email|required',
                'mobile' => 'required',
                'role_id' => 'required',
                'designation_id' => 'required',
                'address' => 'required',
                'division_id' => 'required',
                'district_id' => 'required',
                'upazila_id' => 'required',
                'office_id' => 'required',
            ]);

            $user = User::where('id', $id)->first();
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->full_name = $request->first_name.' '.$request->last_name;

            // check email already exist on user update
            if($request->email != $user->email){
                $check = User::where('email', $request->email)->first();
                if(!empty($check)){
                    return redirect()->route('admin.user.index')->with('error', 'ই-মেইল অলরেডি ব্যাবহার করা হয়েছে..!');
                }else{
                    $user->email = $request->email;        
                }
            }else{
                $user->email = $request->email;
            }

            $user->mobile = $request->mobile;
            $user->role_id = $request->role_id;
            $user->designation_id = $request->designation_id;
            $user->address = $request->address;
            $user->division_id = $request->division_id;
            $user->district_id = $request->district_id;
            $user->upazila_id = $request->upazila_id;
            $user->office_id = $request->office_id;
            $user->horticulture_cente_id = $request->horticulture_center_id;
            $user->updated_by = Auth::user()->id;
            $user->status = $request->status;

            if($request->image){
                // $imageName = time().'.'.$request->image->extension();
                // $user->image = $imageName;
                // $request->image->move(public_path('userImages'), $imageName);
                $cp = $request->file('image');
                $extension = strtolower($cp->getClientOriginalExtension());
                $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
                Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
                $user->image = $randomFileName;
            }

            $user->save();

            return redirect()->route('admin.user.index')->with('success', 'ব্যবহারকারী সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }


    }

    public function block($id)
    {
        $currentUser = Auth::user();
        if(Gate::allows('block_user', $currentUser)){
            $user = User::where('id', $id)->first();
            $user->status = 2;
            $user->save();
            return redirect()->route('admin.user.index')->with('success', 'ব্যবহারকারীকে সফলভাবে অবরুদ্ধ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function active($id)
    {
        $currentUser = Auth::user();
        if(Gate::allows('block_user', $currentUser)){
            $user = User::where('id', $id)->first();
            $user->status = 1;
            $user->save();
            return redirect()->route('admin.user.index')->with('success', 'ব্যবহারকারীকে সফলভাবে আনব্লক করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }
    }

    public function show($id)
    {
        $currentUser = Auth::user();
        if(Gate::allows('view_user', $currentUser)){
            $user = User::findOrFail($id);
            $menu_expand = route('admin.user.index');
            return view('backend.admin.user.show', compact('user', 'menu_expand'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        $oldPasswordInput = Hash::check($request->oldPassword, $user->password);
        if($oldPasswordInput){
            $newPassword = $request->newPassword;
            $confirmPassword = $request->confirmPassword;
            if($newPassword === $confirmPassword){
                $user->password = Hash::make($request->newPassword);
                $user->save();
                return redirect()->route('admin.user.show', $user->id)->with('success', 'পাসওয়ার্ড সফলভাবে আপডেট করা হয়েছে..!');
            }else{
                return redirect()->route('admin.user.show', $user->id)->with('error', 'নতুন পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মেলেনি..!');
            }
        }else{
            return redirect()->route('admin.user.show', $user->id)->with('error', 'পুরানো পাসওয়ার্ড মেলেনি..!');
        }

    }

    public function changeOtherUserPassword(Request $request)
    {
        $this->validate($request, [
            'newPassword' => 'required',
            'confirmPassword' => 'required',
        ]);

        $user = User::where('id', $request->id)->first();
        
        $newPassword = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        if($newPassword === $confirmPassword){
            $user->password = Hash::make($request->newPassword);
            $user->save();
            return redirect()->route('admin.user.show', $user->id)->with('success', 'পাসওয়ার্ড সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return redirect()->route('admin.user.show', $user->id)->with('error', 'নতুন পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মেলেনি..!');
        }
        
    }

    public function edit_profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $menu_expand = route('admin.user.index');
        $divisions = Division::where('status', 1)->get();
        return view('backend.admin.user.edit_profile', compact('user', 'menu_expand', 'divisions'));
    }

    public function update_profile(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required', 
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required', 
            'address' => 'required', 
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->full_name = $request->first_name.' '.$request->last_name;

        // check email already exist on user update
        if($request->email != $user->email){
            $check = User::where('email', $request->email)->first();
            if(!empty($check)){
                return redirect()->route('admin.user.index')->with('error', 'ই-মেইল অলরেডি ব্যাবহার করা হয়েছে..!');
            }else{
                $user->email = $request->email;        
            }
        }else{
            $user->email = $request->email;
        }

        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id = $request->upazila_id;
        $user->updated_by = Auth::user()->id;
        $user->status = $request->status;

        if($request->image){
            // $imageName = time().'.'.$request->image->extension();
            // $user->image = $imageName;
            // $request->image->move(public_path('userImages'), $imageName);
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
            $user->image = $randomFileName;
        }

        $user->save();

        return redirect()->back()->with('success', 'ব্যবহারকারী সফলভাবে আপডেট করা হয়েছে..!');

    }

    public function editUserMinimum($id)
    {
        $user = User::where('id', $id)->first();
        $menu_expand = route('admin.user.index');
        $divisions = Division::where('status', 1)->get();
        return view('backend.admin.user.edit_user_minimum', compact('user', 'menu_expand', 'divisions'));
    }

    public function updateUserMinimum(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required', 
            'last_name' => 'required',
            'mobile' => 'required',
            'email' => 'required', 
            'address' => 'required', 
        ]);

        $user = User::where('id', $request->user_id)->first();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->full_name = $request->first_name.' '.$request->last_name;

        // check email already exist on user update
        if($request->email != $user->email){
            $check = User::where('email', $request->email)->first();
            if(!empty($check)){
                return redirect()->route('admin.user.index')->with('error', 'ই-মেইল অলরেডি ব্যাবহার করা হয়েছে..!');
            }else{
                $user->email = $request->email;        
            }
        }else{
            $user->email = $request->email;
        }

        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->division_id = $request->division_id;
        $user->district_id = $request->district_id;
        $user->upazila_id = $request->upazila_id;
        $user->updated_by = Auth::user()->id;
        $user->status = $request->status;

        if($request->image){
            // $imageName = time().'.'.$request->image->extension();
            // $user->image = $imageName;
            // $request->image->move(public_path('userImages'), $imageName);
            $cp = $request->file('image');
            $extension = strtolower($cp->getClientOriginalExtension());
            $randomFileName = 'userImage'.date('Y_m_d_his').'_'.rand(10000000,99999999).'.'.$extension;
            Storage::disk('public')->put('userImages/'.$randomFileName, File::get($cp));
            $user->image = $randomFileName;
        }

        $user->save();

        return redirect()->back()->with('success', 'ব্যবহারকারী সফলভাবে আপডেট করা হয়েছে..!');

    }

}
