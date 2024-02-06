<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    protected $fillable = [
        'active',
        'disable',
        'name',
        'photoURL',
        'team_id',
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
