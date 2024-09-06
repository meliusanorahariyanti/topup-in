<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function game(){
        return $this->hasMany(Game::class, 'game_type_id', 'id');
    }
}
