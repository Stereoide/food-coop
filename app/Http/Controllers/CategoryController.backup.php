<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index() {
		return view('pages.admin.categories.index');
	}
	
	public function create() {
		return view('pages.admin.categories.create');
	}
	
	public function store() {
		echo 'store';
	}
	
	public function show($id) {
		return view('pages.admin.categories.show');
	}
	
	public function edit($id) {
		return view('pages.admin.categories.edit');
	}
	
	public function update($id) {
		echo 'update';
	}
	
	public function destroy($id) {
		echo 'destroy';
	}
}
