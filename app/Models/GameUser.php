<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameUser extends Model
{
    use HasFactory;

    public $table = 'game_user';

    protected $fillable = [
        'user_id',
        'game_id',
    ];

}
