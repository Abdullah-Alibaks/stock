<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $fillable = [
        'stock_name',
        'ticket',
        'value'       
    ];
    protected $table = 'stocks';
    use HasFactory;
}
