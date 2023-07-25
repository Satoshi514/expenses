<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outgo;

class OutgoController extends Controller
{
    public function show(Request $request) {

   return Outgo::select('amount')
           ->where('month',$request->month)
           ->get();
           /*return([100,12,15,30]);*/
    }

    public function months() {

    return Outgo::select('month')
           ->groupBy('month')
           ->pluck('month');
    }
}
