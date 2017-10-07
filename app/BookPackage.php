<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPackage extends Model
{

    public function books()
    {
    	return $this->hasMany('App\Book', 'book_package_id', 'id');
    }


    /**
     * If the package fixed_price is not set, Then Calculates the package price by adding the prices of the belonging books,
     * 
     * @return integer the package price
     */
    public function price()
    {
    	if ( $this->isFixedPrice() ) {
    		return $this->fixed_price;
    	}

    	return $this->books()->sum('price');
    }


    /**
     * Same as !empty() with the exception that 0 is true, for datatype float
     *  
     * @return boolean
     */
    function isFixedPrice() {
	    return ($this->fixed_price === (float) 0||$this->fixed_price);
	}
}
