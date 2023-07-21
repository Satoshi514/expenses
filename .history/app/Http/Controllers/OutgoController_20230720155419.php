<?php

namespace App\Http\Controllers;

use App\Models\Outgo;
use Illuminate\Http\Request;

class OutgoController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function__construct() {
        $this->middleware('auth', ['only' => ['create','show']]);
    }
    
     public function index()
    {       
         return view('posts.index');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $outgo = new Outgo();
       $outgo->major_subject_name = $request->input('major_subject_name');
       $outgo->subject = $request->input('subject');
       $outgo->year = $request->input('year');
       $outgo->month = $request->input('month');
       $outgo->amount = $request->input('amount');
       $outgo->description = $request->input('description');

       $outgo->save();

       return redirect()->route('posts.show',compact('outgo'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function show(Outgo $outgo)
    {
        $outgos = Outgo::select('major_subject_name')
                 ->selectRaw('SUM(amount) as amount')
                 ->groupBy('major_subject_name')
                 ->get();

    return view('posts.show',compact('outgos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function edit(Outgo $outgo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Outgo $outgo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outgo $outgo)
    {
        //
    }
}
