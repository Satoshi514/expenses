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
        '5' => '交際費',
        '6' => '交通費',
        '7' => '通信費',
        '8' => '娯楽費',
        '9' => '医療費',
        '10' => '教養・教育費',
        '11' => '衣服・美容費',
        '12' => '特別な支出',
        '13' => '雑費・その他',
      ];
    
      const SUBJECT = [
        '1' => [
            '1' => '食料品',
        {cd:"2", label:"外食"},
        {cd:"3", label:"カフェ"},
        {cd:"4", label:"その他食費"},
      ];
     
      var arrHome = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"家賃"},
        {cd:"2", label:"地震・火災保険"},
        {cd:"3", label:"その他住宅費"},
      ];
    
      var arrEnergy = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"電気代"},
        {cd:"2", label:"水道代"},
        {cd:"3", label:"ガス代"},
      ];
    
      var arrDaily = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"ドラッグストア"},
        {cd:"2", label:"その他日用品"},
      ];
          
      var arrDate = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"飲み会"},
        {cd:"2", label:"プレゼント代"},
        {cd:"3", label:"交際費"},
        {cd:"4", label:"冠婚葬祭"},
        {cd:"5", label:"その他交際費"},
      ];
    
      var arrTraffic = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"電車"},
        {cd:"2", label:"バス"},
        {cd:"3", label:"タクシー"},
        {cd:"4", label:"飛行機"},
        {cd:"5", label:"その他交通費"},
      ];
            
      var arrTelecommunication = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"携帯電話"},
        {cd:"2", label:"インターネット"},
        {cd:"3", label:"固定電話"},
        {cd:"4", label:"放送視聴料"},
        {cd:"5", label:"宅配便"},
      ];
    
      var arrFavorite = [
        {cd:"", label:"▼項目選択"}, 
        {cd:"1", label:"本"},
        {cd:"2", label:"CD"},
        {cd:"3", label:"Blu-ray"},
        {cd:"4", label:"映画"},
        {cd:"5", label:"アウトドア"},
        {cd:"6", label:"旅行"},
        {cd:"7", label:"秘密の趣味"},
        {cd:"8", label:"その他娯楽費"},
      ];
    
      var arrMedical = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"医療費"},
        {cd:"2", label:"薬"},
        {cd:"3", label:"その他医療費"},
      ];
    
      var arrEducation = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"書籍"},
        {cd:"2", label:"習い事"},
        {cd:"3", label:"学費"},
        {cd:"4", label:"その他教養・教育費"},
      ];
    
      var arrFashion = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"服"},
        {cd:"2", label:"靴"},
        {cd:"3", label:"クリーニング"},
        {cd:"4", label:"美容院・エステ"},
        {cd:"5", label:"化粧品"},
        {cd:"6", label:"アクセサリー"},
        {cd:"7", label:"その他衣服・美容費"},
      ];
    
      var arrSpecial = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"家電"},
        {cd:"2", label:"家具"},
        {cd:"3", label:"その他特別な支出"},
      ];
    
      var arrUnclassified = [
        {cd:"", label:"▼項目選択"},
        {cd:"1", label:"雑費"},
        {cd:"2", label:"寄付金"},
        {cd:"3", label:"仕送り"},
        {cd:"4", label:"用途不明金"},
      ];
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
