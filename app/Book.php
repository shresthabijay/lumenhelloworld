<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['name','publisher_id'];

    public function publisher()
    {
        return $this->belongsTo('App\Publisher');
    }

    public function authors()
    {
        return $this->belongsToMany('App\Author');
    }
}
