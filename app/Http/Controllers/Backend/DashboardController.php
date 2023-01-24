<?php

namespace App\Http\Controllers\Backend;

use App\User;
use Illuminate\Http\Request;
use App\Models\Backend\SecureEmail;
use App\Models\Backend\Transaction;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {

        $data['transactionList'] = [];

        return view('backend.modules.dashboard.admin')->with($data);
    }
}
