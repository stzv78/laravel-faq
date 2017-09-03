<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['description', 'status', 'category_id'];

    public function answer()
    {
        return $this->hasOne('App\Models\Answer');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }


}
