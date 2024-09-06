<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'credit_id',
        'order_date',
        'IDGameApp',
        'comments',
        'total',
        'status',
    ];

    public $incrementing = false;

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function credit(){
        return $this->belongsTo(Credit::class, 'credit_id', 'id');
    }
}
