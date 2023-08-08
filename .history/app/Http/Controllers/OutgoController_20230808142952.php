<?php

namespace App\Http\Controllers;

use App\Models\Outgo;
use App\Models\Income;
use Illuminate\Http\Request;

class OutgoController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     const MAJOR_SUBJECT_NAME = [
        '1' => '食費',
        '2' => '住宅費',
        '3' => '光熱費',
        '4' => '日用品',
        '5' => '交際費’
     ];
    
     public function __construct(){
        $this->middleware('auth', ['only' => ['create', 'show']]);
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
       $outgo->major_subject_name = $request->major_subject_name->text('major_subject_name');
       $outgo->subject = $request->subject->input('subject');
       $outgo->year = $request->input('year');
       $outgo->month = $request->input('month');
       $outgo->day = $request->input('day');
       $outgo->amount = $request->input('amount');
       $outgo->description = $request->input('description');

       $outgo->save();

       return to_route('posts.show',compact('outgo'));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Outgo $outgo)
    {
        $outgos = Outgo::all();
        
        $incomes = Income::all();
        $outgos = Outgo::paginate(5);
        
       return view('posts.show',compact('outgos','incomes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function edit(Outgo $outgo) 
    {
      return view('posts.edit',compact('outgo'));
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
       $outgo->major_subject_name = $request->input('major_subject_name');
       $outgo->subject = $request->input('subject');
       $outgo->year = $request->input('year');
       $outgo->month = $request->input('month');
       $outgo->day = $request->input('day');
       $outgo->amount = $request->input('amount');
       $outgo->description = $request->input('description');

       $outgo->update();

       return to_route('posts.show',compact('outgo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outgo  $outgo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Outgo $outgo)
    {
        $outgo->delete();

        return to_route('posts.show');
    }
}
