<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function team(){
        return $this->hasMany(Team::class);
    }

    public function round(){
        return $this->belongsTo(Round::class);
    }

}
