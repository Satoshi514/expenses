<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class outgo extends Model
{
    use HasFactory;

    protected  $fillable = ['major_subject_name','subject','amount','description','year','month','created_at','updated_at'];
}
