<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		/* Fetch categories */
		
		$categories = Category::all();
		
		/* Show template */
		
		return view('pages.index')->with(compact('categories'));
    }
	
	public function logout() {
		/* Log the current user out */
		
		Auth::logout();
		
		/* Return to frontpage */
		
		return redirect('/');
	}
}
