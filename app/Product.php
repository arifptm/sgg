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

    public function user(){
        return $this->belongsTo('App\user');
    }

    public function getVerifiedAttribute($v){
        if ($v == 0){
            return 'Belum diverifikasi';
        }    
    } 

    public function getCreatedAtAttribute($v){
            return Carbon::parse($v)->format('d-m-Y');

    } 

    public function getRegisterDateAttribute($v){
        if (Route::currentRouteName() == 'products.data'){
            return Carbon::parse($v)->format('d-m-Y');
        }
        
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

    public function getPriceAttribute($v)
    {
        return number_format($v,0,",",".");
    }    

}
