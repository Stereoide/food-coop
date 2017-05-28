<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    public function index($categoryId) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		return view('pages.admin.products.index');
	}
	
	public function create($categoryId) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$category = Category::findOrFail($categoryId);
		
		/* Instantiate new product model */
		
		$product = new Product;
		
		return view('pages.admin.products.create')->with(compact('category', 'product'));
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
			'price' => 'Preis',
		];
		
		$rules = [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Create product */
		
		$input = $request->all();
		
		$product = Product::create($request->all());
		$product->name = $input['name'];
		$product->description = $input['description'];
		$product->price = str_replace(',', '.', $input['price']);
		$product->save();
		
		$request->session()->flash('message', 'Produkt erstellt');
		
		/* Redirect back to products list */
		
		return redirect('admin/categories/' . $input['category_id']);
	}
	
	public function show($categoryId, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$category = Category::findOrFail($categoryId);
		$product = Product::findOrFail($id);
		
		return view('pages.admin.products.show')->with(compact('category', 'product'));
	}
	
	public function edit($categoryId, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$category = Category::findOrFail($categoryId);
		$product = Product::findOrFail($id);
		
		return view('pages.admin.products.edit')->with(compact('category', 'product'));
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
			'price' => 'Preis',
		];
		
		$rules = [
			'name' => 'required',
			'description' => 'required',
			'price' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Update product */
		
		$input = $request->all();
		
		$product = Product::findOrFail($input['id']);
		$product->name = $input['name'];
		$product->description = $input['description'];
		$product->price = str_replace(',', '.', $input['price']);
		$product->save();
		
		$request->session()->flash('message', 'Produkt aktualisiert');
		
		/* Redirect back to product */
		
		return redirect('admin/categories/' . $input['category_id'] . '/products/' . $input['id']);
	}
	
	public function destroy(Request $request, $categoryId, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Delete category */
		
		$product = $productRaw = Product::findOrFail($id);
        $product->delete();
		
		$request->session()->flash('message', 'Produkt ' . $productRaw->name . ' gelöscht');

        /* Redirect */
		
        return redirect('admin/categories/' . $categoryId);
	}
}
