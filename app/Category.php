<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    public function page(){

    	 return $this->hasMany('App\Page','parent_id');
    }
}
