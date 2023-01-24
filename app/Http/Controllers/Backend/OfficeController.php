<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Auth;
use App\Models\Office;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\HorticultureCenter;

class OfficeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('manage_office', $user)){
            $offices = Office::with('createdUser',)->where('status', '!=', 2)->latest()->paginate(15);
            $divisions = Division::where('status', 1)->get();
            $districts = District::where('status', 1)->get();
            $upazilas = Upazila::where('status', 1)->get();
            $horticultures = HorticultureCenter::where('status', 1)->get();
            return view('backend.admin.office.index', compact('offices', 'divisions', 'districts', 'upazilas', 'horticultures'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function archived()
    {
        $offices = Office::where('status', 2)->latest()->paginate(15);
        $divisions = Division::where('status', 1)->get();
        $districts = District::where('status', 1)->get();
        $upazilas = Upazila::where('status', 1)->get();
        $horticultures = HorticultureCenter::where('status', 1)->get();

        return view('backend.admin.office.archived', compact('offices', 'divisions', 'districts', 'upazilas', 'horticultures'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_office', $user)){
            $office = new Office;
            $office->name = $request->name;
            $office->division_id = $request->division;
            $office->district_id = $request->district;
            $office->upazila_id = $request->upazila;
            $office->horticulture_center_id = $request->horticulture;
            $office->created_by = Auth::user()->id;
            $office->status = $request->status ?? 0;
            $office->save();
            return redirect()->route('admin.office.index')->with('success', 'নতুন অফিস সফলভাবে যোগ করা হয়েছে...!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function show($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_office', $user)){
            $office = Office::where('id', $id)->first();
            $menu_expand = route('admin.office.index');
            return view('backend.admin.office.view', compact('office', 'menu_expand'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_office', $user)){
            $office = Office::where('id', $id)->first();
            $office->name = $request->name;
            $office->division_id = $request->division;
            $office->district_id = $request->district;
            $office->upazila_id = $request->upazila;
            $office->horticulture_center_id = $request->horticulture;
            $office->updated_by = Auth::user()->id;
            $office->status = $request->status ?? 0;
            $office->save();
            return redirect()->route('admin.office.index')->with('success', 'অফিস সফলভাবে আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

}
