<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class CategoryController extends Controller
{
    public function index() {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$categories = Category::all();
		
		return view('pages.admin.categories.index')->with(compact('categories'));
	}
	
	public function create() {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Instantiate new category model */
		
		$category = new Category;
		
		return view('pages.admin.categories.create')->with(compact('category'));
	}
	
	public function store(Request $request) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Perform validation */
		
		$niceNames = [
			'name' => 'Name',
			'description' => 'Beschreibung',
		];
		
		$rules = [
			'name' => 'required',
			'description' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Create category */
		
		$input = $request->all();
		
		$category = Category::create($request->all());
		
		$request->session()->flash('message', 'Kategorie erstellt');
		
		/* Redirect back to category list */
		
		return redirect('admin/categories');
	}
	
	public function show($id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$category = Category::findOrFail($id);
		
		return view('pages.admin.categories.show')->with(compact('category'));
	}
	
	public function edit($id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$category = Category::findOrFail($id);
		
		return view('pages.admin.categories.edit')->with(compact('category'));
	}
	
	public function update(Request $request, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Perform validation */
		
		$niceNames = [
			'name' => 'Name',
			'description' => 'Beschreibung',
		];
		
		$rules = [
			'name' => 'required',
			'description' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Update category */
		
		$input = $request->all();
		
		$category = Category::findOrFail($id);
		$category->update($request->all());
		
		$request->session()->flash('message', 'Kategorie aktualisiert');
		
		/* Redirect back to categories list */
		
		return redirect('admin/categories');
	}
	
	public function destroy(Request $request, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Fetch category */
		
		$category = Category::findOrFail($id);
		
		/* Delete all products for this category and delete them first */
		
		$products = $category->products;
		
		foreach ($products as $product) {
			$product->delete();
		}
		
		/* Delete category */
		
        $category->delete();
		
		$request->session()->flash('message', 'Kategorie ' . $category->name . ' gelöscht');

        /* Redirect */
		
        return redirect('admin/categories');
	}
}
