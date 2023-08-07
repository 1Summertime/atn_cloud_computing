<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'product';

    public function category() {
        return $this -> belongsTo('App\Models\category', 'category_id');
    }

    public function user() {
        return $this -> belongsTo('App\Models\User', 'user_id');
    }

    public function image() {
        return $this -> hasMany('App\Models\product_image');
    }

    public function feedback() {
        return $this -> hasMany('App\Models\feedback');
    }
    public function order_detail() {
        return $this -> hasMany('App\Models\order_detail');
    }
    protected $fillable = ['name', 'description', 'quanity', 'brand', 'color', 'category_id', 'user_id']; 
   
}
