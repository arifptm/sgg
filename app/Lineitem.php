<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Order;

class Lineitem extends Model
{
    protected $guarded = ['id'];

    public function order(){
    	return $this->belongsTo('App\Order');
    }

	public function product(){
    	return $this->belongsTo('App\Product');
    }

}
