<?php

namespace App\Http\Controllers;

use App\Book;
use App\BookPackage;
use Illuminate\Http\Request;

class BookPackageController extends Controller
{
	/**
	 * Lists all book-packages
	 * 
	 * @return  \Illuminate\View\View
	 */
    public function index()
    {
    	$bookPackages = BookPackage::all();

    	return view('book_packages.index', compact('bookPackages'));
    }


    /**
	 * Stores a book-package and updates book-package-list with AJAX
	 * 
	 * @param  Request $request
	 * 
	 * @return  mixed values that render the view with AJAX
	 */
    public function store(Request $request)
    {
    	$createPackage = new BookPackage;
    	$createPackage->name = $request->packageName;
    	$createPackage->fixed_price = $request->fixedPackagePrice;
    	$createPackage->save();

    	$bookPackages = BookPackage::all();

    	return [
    		'bookPackages' => view('book_packages.partials.tables.book_package_table', compact('bookPackages'))->render(),
    		'message' => 'Bokpaket skapad.'
    	];
    }


    /**
     * Show update modal for book-package, with book list
     * 
     * @param  integer $book_package is an id
     * 
     * @return  mixed values that render the view with AJAX
     */
    public function show($book_package)
    {
    	$bookPackage = BookPackage::findOrFail($book_package);
    	$books = $bookPackage->books;

    	return [
    		'bookPackage' => $bookPackage,
    		'bookList' => view('book_packages.partials.forms.edit_book_list', compact('books') )->render()
    	];
    }


    /**
     * Update book-package modal along with belonging books
     * 
     * @param  Request $request
     * @param  integer $book_package is an id
     * 
     * @return mixed values that render the view with AJAX
     */
    public function update(Request $request, $book_package)
    {
    	$bookPackage = BookPackage::findOrFail($book_package);
    	$bookPackage->name = $request->packageName;
    	$bookPackage->fixed_price = $request->fixedPackagePrice;
    	$bookPackage->save();

    	if (isset($request->books)) {
	    	foreach ($request->books as $bookId => $formField) {
	    		$book = Book::findOrFail($bookId);
	    		$book->title = $formField['bookTitle'];
	    		$book->price = $formField['bookPrice'];
	    		$book->save();
	    	}
    	}

    	$bookPackages = BookPackage::all();

    	return [
    		'bookPackages' => view('book_packages.partials.tables.book_package_table', compact('bookPackages'))->render(),
    		'message' => 'Bokpaket har uppdaterats'
    	];
    }


    /**
     * Deletes a book-package, and deletes all belonging books through delete-cascade
     * 
     * @param  integer $book_package is an id
     * 
     * @return  mixed values that render the view with AJAX
     */
    public function destroy($book_package)
    {
    	$bookPackage = BookPackage::findOrFail($book_package);
    	$bookPackage->delete();

    	$bookPackages = BookPackage::all();

    	return [
    		'bookPackages' => view('book_packages.partials.tables.book_package_table', compact('bookPackages'))->render(),
    		'message' => 'Bokpaket har raderats'
    	];
    }
}
