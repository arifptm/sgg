<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Order extends Model
{
    protected $guarded = ['id'];

    public function lineitem(){
    	return $this->hasMany('App\Lineitem');
    }


    public function user(){
    	return $this->belongsTo('App\User');
    }
}
