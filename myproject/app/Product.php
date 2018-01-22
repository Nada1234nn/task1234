<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table="products";
public $timestamps=false;
    public function users(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        //return $this->belongsTo('App\Category');
        return $this->belongsTo(Category::class);

    }
    //
}
