<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'slide';
    protected $fillable = ['name', 'slide', 'description'];
}
