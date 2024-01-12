<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\StudentResults;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function searchStudentResult(Request $request)
    {
        $studentResult = StudentResults::where('student_id', $request->student_id)->first();
        
        return view('frontend.pages.result', compact('studentResult'));
    }
}
