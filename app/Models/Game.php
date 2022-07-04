<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    public $table = 'games';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'title',
        'plataform',
        'kind',
        'price',
        'description',
        'image',
        'status'
    ];

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'game_user');
    }

    /**
     * PLATAFORM constant
     * @return array
     */
    const PLATAFORM = [
        'playstation',
        'pc',
        'snes',
        'xbox',
        'sega'
    ];

    const PLATAFORM_TRANSLATE = [
        'playstation' => 'Playstation',
        'pc' => 'PC',
        'snes' => 'Super Nintendo',
        'xbox' => 'Xbox',
        'sega' => 'SEGA'
    ];

    /**
     * CATEGORY constant
     * @return array
     */
    const CATEGORY = [
        'tiro',
        'corrida',
        'aventura',
        'luta'
    ];

        /**
     * STATUS constant
     * @return array
     */
    const STATUS = [
        'available',
        'unavailable'
    ];
}
