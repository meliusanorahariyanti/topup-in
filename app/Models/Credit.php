<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'price',
        'information',
    ];

    public function game(){
        return $this->belongsTo(Game::class, 'game_id', 'id');
    }
}
