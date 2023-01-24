<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\FiscalYear;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Order;
use App\Models\User;
use App\Models\OrderDetail;
use App\Models\Office;

use Auth;

class IndexController extends Controller
{
    public function index()
    {

        return view('backend.index');

    }

}
