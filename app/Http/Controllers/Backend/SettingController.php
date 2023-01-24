<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::oldest()->first();

        return view('backend.admin.setting.edit', compact('setting'));
    }
    
    public function update(Request $request, $id)
    {
        $setting = Setting::find($id);
        $data = $request->all();
        if ($request->file('logo')) {
                    
            $path = $request->file('logo')->store('/public/logo');
            
            $path = Str::replace('public/logo', '', $path);
            $data['logo'] = Str::replace('/', '', $path);
        }
        if ($setting) {
            $setting->update($data);
        } else {
            Setting::create($data);
        }

        return redirect()->back()->with('success', 'সেটিং আপডেট করা হয়েছে..!');
    }
}
