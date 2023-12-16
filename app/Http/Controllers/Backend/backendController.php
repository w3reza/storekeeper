<?php

namespace App\Http\Controllers\Backend;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class backendController extends Controller
{
   public function index()
   {


     // Today's Sales
     $todaySales = DB::table('sales')->whereDate('created_at', today())->sum('total_price');

     // Yesterday's Sales
     $yesterdaySales = DB::table('sales')->whereDate('created_at', Carbon::yesterday())->sum('total_price');
     // This Month's Sales
     $thisMonthSales = DB::table('sales')->whereMonth('created_at', now()->month)->sum('total_price');

     // Last Month's Sales
     $lastMonthSales = DB::table('sales')->whereMonth('created_at', now()->subMonth()->month)->sum('total_price');

    return view('backend.pages.home', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
   }

}
