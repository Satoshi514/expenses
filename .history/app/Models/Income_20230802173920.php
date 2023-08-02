<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;

    protected $fillable = ['id','major_category_name','category','year','month','day','amount','description']; 

    public function income {

    return $this->belongsTo('App\Models\Outgo');
    }
}

