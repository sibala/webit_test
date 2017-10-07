<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookPackage;
use Illuminate\Http\Request;

class BookController extends Controller
{

	/**
	 * Stores a book and updates book-package-list with AJAX
	 * 
	 * @param  Request $request  values from form
	 * 
	 * @return  mixed values that render the view with AJAX
	 */
    public function store(Request $request)
    {
    	// dd($request->all());
    	$createBook = new Book;
    	$createBook->book_package_id = $request->bookPackageId;
    	$createBook->title = $request->bookTitle;
    	$createBook->price = $request->bookPrice;
    	$createBook->save();

    	$bookPackages = BookPackage::all();

    	return [
    		'bookPackages' => view('book_packages.partials.tables.book_package_table', compact('bookPackages'))->render(),
    		'message' => 'Ny bok tillagd'
    	];
    }


    /**
     * Deletes a book
     * 
     * @param  Request $request [description]
     * @param  integer  $book    is an id
     * 
     * @return mixed values that render the view with AJAX
     */
    public function destroy(Request $request, $book)
    {
    	$book = Book::findOrFail($book);
    	$book->delete();

    	$books = Book::where('book_package_id', $request->bookPackageId)->get();

    	return [
    		'bookList' => view('book_packages.partials.forms.edit_book_list', compact('books') )->render()
    	];
    }
}
