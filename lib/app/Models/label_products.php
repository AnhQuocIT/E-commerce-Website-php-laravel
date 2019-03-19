<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class label_products extends Model
{
    protected $table = "label_products";
    protected $guarded = [];

    public function product(){
    	return $this->hasMany('App\Product','label_id','id');
    }
}
