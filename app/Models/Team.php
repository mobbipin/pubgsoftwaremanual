<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $table = 'teams';
    protected $fillable = ['name', 'group_id', 'teamPhotoURL', 'logoURL', 'smallLogoURL', 'color', 'tag', 'slot'];

    public function player()
    {
        return $this->hasMany(Player::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}