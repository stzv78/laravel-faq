<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];
    public $answers = 0;

    public function question()
    {
        return $this->hasMany('App\Models\Question');
    }

    public function getAnswer()
    {
        $this->answers = $this->question()->count();
        foreach ($this->question()->get() as $question) {
            if (isset($question->answer)) {
                $this->answers--;
            }
        }
        return $this->answers;
    }
}
