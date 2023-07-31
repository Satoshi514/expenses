<?php

namespace App\Http\Controllers\Ajax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Outgo;

class OutgoController extends Controller
{
    public function show(Request $request) {

   /*return Outgo::select('major_subject_name','amount')
           ->where('month',$request->month,'year',$request->year)
           ->get();*/
           return([100,12,15,30]);
    }

    /*public function months() {

    return Outgo::select('month')
           ->groupBy('month')
           ->pluck('month');
    }

    public function years() {
       return Outgo::select('year')
              ->groupBy('year')
              ->plunk('year');
    }
}
