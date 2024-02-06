<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrizePool extends Model
{
    use HasFactory;
    protected $fillable = ['position', 'prize', 'round_id', 'tournament_id'];
}
