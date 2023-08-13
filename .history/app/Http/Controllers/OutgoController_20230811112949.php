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
            '2' => '外食',
            '3' => 'カフェ',
            '4' => 'その他食費',
        ],
        '2' => [
            '1' => '家賃',
            '2' => '地震・火災保険',
            '3' => 'その他住宅費',
        ],
        '3' => [
            '1' => '電気代',
            '2' => '水道代',
            '3' => 'ガス代',
        ],
        '4' => [
            '1' => 'ドラッグストア',
            '2' => 'その他日用品',
        ],
        '5' => [
            '1' => '飲み会',
            '2' => 'プレゼント代',
            '3' => '交際費',
            '4' => '冠婚葬祭',
            '5' => 'その他交際費',
        ],
        '6' => [
            '1' => '電車',
            '2' => 'バス',
            '3' => 'タクシー',
            '4' => '飛行機',
            '5' => 'その他交通費',
        ],
        '7' => [
            '1' => '携帯電話',
            '2' => 'インターネット',
            '3' => '固定電話',
            '4' => '放送視聴料',
            '5' => '宅配便',
        ],
        '8' => [
            '1' => '本',
            '2' => 'CD',
            '3' => 'Blu-ray',
            '4' => '映画',
            '5' => 'アウトドア',
            '6' => '旅行',
            '7' => '秘密の趣味',
            '8' => 'その他娯楽費',
        ],
        '9' => [
            '1' => '医療費',
            '2' => '薬',
            '3' => 'その他医療費',
        ],
        '10' => [
            '1' => '書籍',
            '2' => '習い事',
            '3' => '学費',
            '4' => 'その他教養・教育費',
        ],
        '11' => [
            '1' => '服',
            '2' => '靴',
            '3' => 'クリーニング',
            '4' => '美容院・エステ',
            '5' => '化粧品',
            '6' => 'アクセサリー',
            '7' => 'その他衣服・美容費',
        ],
        '12' => [
            '1' => '家電',
            '2' => '家具',
            '3' => 'その他特別な支出',
        ],
        '13' => [
            '1' => '雑費',
            '2' => '寄付金',
            '3' => '仕送り',
            '4' => '用途不明金',
        ],
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
    public function outgo_create() {
        return view('posts.outgo_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function translation($major_subject,$subject) {
        $major_subject_name = self::MAJOR_SUBJECT_NAME[$major_subject];
        $subject = self::SUBJECT[$major_subject] [$subject];

        return [
            $major_subject_name,
            $subject,
        ];
    }

    public function outgo_store(Request $request)
    {
        list($major_subject_name, $subject) = self::translation($request->input('major_subject_name'),$request->input('subject'));
       $outgo = new Outgo();
       $outgo->major_subject_name = $major_subject_name;
       $outgo->subject = $subject;
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
        $outgos = Outgo::paginate(5);
        $incomes = Income::all();
        $incomes = Income::paginate(5);
        
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

        return to_route('posts.show',compact('outgo'));
    }
}
