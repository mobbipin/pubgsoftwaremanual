<?php

namespace App\Models;

use App\Models\Matchz;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = ['round_id', 'first_match_id', 'second_match_id', 'third_match_id', 'fourth_match_id', 'fifth_match_id', 'sixth_match_id'];


    public function match1()
    {
        return $this->belongsTo(Matchz::class, 'first_match_id', 'id');
    }
    public function match2()
    {
        return $this->belongsTo(Matchz::class, 'second_match_id', 'id');
    }
    public function match3()
    {
        return $this->belongsTo(Matchz::class, 'third_match_id', 'id');
    }
    public function match4()
    {
        return $this->belongsTo(Matchz::class, 'fourth_match_id', 'id');
    }
    public function match5()
    {
        return $this->belongsTo(Matchz::class, 'fifth_match_id', 'id');
    }
    public function match6()
    {
        return $this->belongsTo(Matchz::class, 'sixth_match_id', 'id');
    }
}
