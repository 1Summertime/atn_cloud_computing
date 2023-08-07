<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'order_detail';
    protected $fillable = ['amount', 'total', 'order_id', 'product_id'];

    
    public function orders() {
        return $this-> belongsTo('App\Models\orders', 'order_id');
    }

    public function product() {
        return $this -> belongsTo('App\Models\product', 'product_id');
    }
}
