<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id',
        'game_type_id',
        'name',
        'description',
        'photo',
    ];

    public function game_type(){
        return $this->belongsTo(GameType::class, 'game_type_id', 'id');
    }

    public function genre(){
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }

    public function credit(){
        return $this->hasMany(Credit::class, 'game_id', 'id');
    }
}
