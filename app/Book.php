<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    public function bookPackage()
    {
    	return $this->belongsTo('App\BookPackage', 'book_package_id', 'id');
    }
}
