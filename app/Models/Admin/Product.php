<?php

namespace App\Models\Admin;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

/**
 * Class Product
 * @package App\Models\Admin
 * @version July 20, 2017, 12:49 am UTC
 */
class Product extends Model
{
    use SoftDeletes;
    use Sluggable;

    public $table = 'products';
    
    protected $dates = ['deleted_at'];    

    public $fillable = [
        'title',
        'slug',
        'register_date',
        'body',
        'image',
        'price',
        'url',
        'placement',
        'disposable',
        'stock'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'title' => 'string',
        'slug' => 'string',
        'body' => 'string',
        'image' => 'string',
        'url' => 'string',
        'placement' => 'string',
        'disposable' => 'boolean',
        'stock' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }    

    
}
