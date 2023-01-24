<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FiscalYear;
use Auth;
use Illuminate\Support\Facades\Gate;

class FiscalYearController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('manage_fiscal_year', $user)){
            $query = FiscalYear::latest();
            if (isset($request->name) and $request->name!='') {
                $query->where('year','like','%'.$request->name.'%');
            }
            $fiscal_years = $query->paginate(20);
            return view('backend.admin.fiscal_year.index', compact("fiscal_years"));
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
        
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('add_fiscal_year', $user)){
            $validated = $request->validate([
                'year' => 'required|unique:fiscal_years',
            ]);
            $data = $request->all();
            $data['created_by'] = auth()->user()->id;
            FiscalYear::create($data);
            return back()->with('success', 'নতুন অর্থবছর যোগ করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
        
    }
    
    public function view($id)
    {
        $user = Auth::user();
        if(Gate::allows('view_fiscal_year', $user)){
            $fiscal_year = FiscalYear::findOrFail($id);
            $menu_expand = route('admin.fiscal_year.index');
            return view('backend.admin.fiscal_year.view', compact("fiscal_year","menu_expand"));
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
        
    }

    public function update($id,Request $request)
    {
        $user = Auth::user();
        if(Gate::allows('edit_fiscal_year', $user)){
            $request->validate([
                'year' => 'required|unique:fiscal_years,year,' . $id,
            ]);
    
            $data = $request->all();
            $data['status'] = $request->status ?? 0;
            $data['updated_by'] = auth()->user()->id;
            FiscalYear::find($id)->update($data);
    
            return back()->with('success', 'অর্থবছর আপডেট করা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
        
    }
    
    public function destroy($id)
    {
        $user = Auth::user();
        if(Gate::allows('delete_fiscal_year', $user)){
            FiscalYear::find($id)->delete();
            return back()->with('success', 'অর্থবছর মুছে ফেলা হয়েছে..!');
        }else{
            return abort(403, "আপনার অনুমতি নেই");
        }
        
    }
}
