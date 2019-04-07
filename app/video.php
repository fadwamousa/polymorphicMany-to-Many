<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    protected $fillable = ['title'];

    public function tags(){

    	return $this->morphToMany(Tag::class,'taggable');
    }
}
