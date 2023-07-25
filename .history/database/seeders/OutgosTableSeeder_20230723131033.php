<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Outgo;

class outgosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $major_subject_names = [
            '食費','住宅費','光熱費','日用品','交際費','交通費','通信費','娯楽費','医療費', '教養・教育費','衣服・美容費','特別な支出','雑費・その他'
        ];

        $food_subjects = [
            '食料品','外食','カフェ','その他食費'
        ];

        $home_subjects = [
            '家賃','地震・火災保険','その他住宅費'
        ];

        $energy_subjects = [
            '電気代','水道代','ガス代'
        ];

        $daily_subjects = [
            'ドラッグストア','その他日用品'
        ];

        $date_subjects = [
            '飲み会','プレゼント代','交際費','冠婚葬祭','その他交際費'
        ];

        $traffic_subjects = [
            '電車','バス','タクシー','飛行機','その他交通費'
        ];
        
        $telecommunication_subjects = [
            '携帯電話','インターネット','固定電話','放送視聴料','宅配便'
        ];

        $favorite_subjects = [
            '本','CD','Blu-ray','映画','アウトドア','旅行','秘密の趣味','その他娯楽費'
        ];

        $medical_subjects = [
            '医療費','薬','その他医療費'
        ];

        $education_subjects = [
            '書籍','習い事','学費','その他教養・教育費'
        ];

        $fashion_subjects = [
            '服','靴','クリーニング','美容院・エステ','化粧品','アクセサリー','その他衣服・美容費'
        ];

        $special_subjects = [
            '家電','家具','その他特別な支出'
        ];

        $unclassified_subjects = [
            '雑費','寄付金','用途不明金','仕送り'
        ];
          
        foreach($major_subject_names as $major_subject_name) {
          if ($major_subject_name == '食費') {
            foreach($food_subjects as $food_subject ) {
                Outgo::create([
                    'name' => $food_subject,
                    'subject' => $food_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
          }

          if ($major_subject_names == '住宅費') {
            foreach($home_subjects as $home_subject ) {
                Outgo::create([
                    'name' => $home_subject,
                    'subject' => $home_subject,
                    'major_subject_name' => $major_subject_name,
                ]); 
            }
          }

          if ($major_subject_names == '光熱費') {
            foreach($energy_subjects as $energy_subject ) {
                Outgo::create([
                    'name' => $energy_subject,
                    'subject' => $energy_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
          }
          
          if ($major_subject_names == '日用品') {
            foreach($daily_subjects as $daily_subject ) {
                Outgo::create([
                    'name' => $daily_subject,
                    'dsubject' => $daily_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
          }

          if ($major_subject_names == '交通費') {
            foreach($traffic_subjects as $traffic_subject ) {
                Outgo::create([
                    'name' => $traffic_subject,
                    'subject' => $traffic_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '交際費') {
            foreach($date_subjects as $date_subject ) {
                Outgo::create([
                    'name' => $date_subject,
                    'subject' => $date_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '通信費') {
            foreach($telecommunication_subjects as $telecommunication_subject ) {
                Outgo::create([
                    'name' => $telecommunication_subject,
                    'subject' => $telecommunication_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '娯楽費') {
            foreach($favorite_subjects as $favorite_subject ) {
                Outgo::create([
                    'name' => $favorite_subject,
                    'subject' => $favorite_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '医療費') {
            foreach($medical_subjects as $medical_subject ) {
                Outgo::create([
                    'name' => $medical_subject,
                    'dsubject' => $medical_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '教養・教育') {
            foreach($education_subjects as $education_subject ) {
                Outgo::create([
                    'name' => $education_subject,
                    'subject' => $education_subject,
                     'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '衣服・美容費') {
            foreach($fashion_subjects as $fashion_subject ) {
                Outgo::create([
                    'name' => $fashion_subject,
                    'subject' => $fashion_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '特別な支出') {
            foreach($special_subjects as $special_subject ) {
                Outgo::create([
                    'name' => $special_subject,
                    'subject' => $special_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }

        if ($major_subject_names == '雑費・その他') {
            foreach($unclassifield_subjects as $unclassifield_subject ) {
                Outgo::create([
                    'name' => $unclassifield_subject,
                    'subject' => $unclassifield_subject,
                    'major_subject_name' => $major_subject_name,
                ]);
            }
        }
}  
 }
}