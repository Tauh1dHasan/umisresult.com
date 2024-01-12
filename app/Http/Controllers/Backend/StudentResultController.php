<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Auth;
use App\Models\StudentResults;

class StudentResultController extends Controller
{
    public function index()
    {
        $studentResults = StudentResults::latest()->paginate(25);
        return view('backend.admin.studentResult.index', compact('studentResults'));
    }

    public function create()
    {
        return view('backend.admin.studentResult.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $studentResult = new StudentResults;
        $studentResult->name = $request->student_name;
        $studentResult->student_id = $request->student_id;
        
        if($request->file('result_image')){
            $path = $request->file('result_image')->store('/public/studentResults');
            
            $path = Str::replace('public/studentResults', '', $path);
            $studentResult->result_image = Str::replace('/', '', $path);
        }
        $studentResult->created_by = $user->id;
        $studentResult->save();
        return redirect()->back()->with('success', 'New Student Result Stored Successfully...!');
    }

    public function show($id)
    {
        $studentResult = StudentResults::where('id', $id)->first();
        return view('backend.admin.studentResult.show', compact('studentResult'));
    }

    public function destroy($id)
    {
        $studentResult = StudentResults::where('id', $id)->first();
        $filePath = 'public/studentResults/'.$studentResult->result_image;
        // Check if the file exists
        if (Storage::exists($filePath)) {
            // Delete the file
            Storage::delete($filePath);
        }
        $studentResult->delete();

        return redirect()->back()->with('success', 'Student Result Deleted Successfully..!');
    }
}
