<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'orders';
    protected $fillable = ['name', 'address', 'date', 'number', 'status_deliver', 'note', 'user_id'];
    
    public function user() {
        return $this -> belongsTo('App\Models\User', 'user_id');
    }
   public function order_detail() {
    return $this ->hasMany('App\Models\order_detail');
   }
}
