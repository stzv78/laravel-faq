<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['answer_text','user_id'];

    public function question()
    {
        return $this->belongsTo('App\Models\Question');
    }

}
