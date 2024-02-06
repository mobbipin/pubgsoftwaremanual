<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    use HasFactory;
    protected $fillable = ['tournament_id', 'round_id', 'first_blood', 'first_fifty_kill', 'first_hundred_kill', 'first_team_fifty_kill', 'first_team_hundred_kill'];
}
