<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use \Carbon\Carbon;
use Route;

class Product extends Model
{
	use Sluggable;
    
    protected $guarded = ['id'];

    public function getVerifiedAttribute($v){
        if ($v == 0){
            return 'Belum diverifikasi';
        }    
    } 

    public function getRegisterDateAttribute($v){
        if (Route::currentRouteName() == 'products.data'){
            return Carbon::parse($v)->format('d-m-Y');
        }
        return Carbon::parse($v)->format('m-d-Y');
    } 

    public function getBodyAttribute($v){
        if (Route::currentRouteName() == 'products.data'){
            return str_limit($v,50);
        } 
        return $v;
    } 

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

}
