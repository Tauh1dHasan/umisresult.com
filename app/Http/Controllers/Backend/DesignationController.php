<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

use Auth;
use App\Models\Designation;

class DesignationController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if(Gate::allows('all_designations', $user)){
            $designations = Designation::with('createdUser')->latest()->paginate(10);
            return view('backend.admin.designation.index', compact('designations'));
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_designation', $user)){
            $designation = new Designation;
            $designation->name = $request->name;
            $designation->created_by = Auth::user()->id;
            $designation->status = 1;
            $designation->save();
            return redirect()->route('admin.designation.index')->with('success', 'নতুন পদ সংযুক্ত করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }

    public function update(Request $request, $id)
    {
        $user = Auth::user();
        if(Gate::allows('edit_designation', $user)){
            $designation = Designation::where('id', $id)->first();
            $designation->name = $request->name;
            $designation->created_by = Auth::user()->id;
            $designation->status = 1;
            $designation->save();
            return redirect()->route('admin.designation.index')->with('success', 'পদ আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই..!");
        }

    }
}
