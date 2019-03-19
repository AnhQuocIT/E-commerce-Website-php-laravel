<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $table = "type_products";
    protected $guarded = [];

    public function product(){
    	return $this->hasMany('App\Product','id_type','id');
    }
}
