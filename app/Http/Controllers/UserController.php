<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    public function index() {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$users = User::all();
		
		return view('pages.admin.users.index')->with(compact('users'));
	}
	
	public function create() {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Instantiate new user model */
		
		$user = new User;
		
		$user->salutation = 'Herr';
		$user->is_administrator = false;
		
		return view('pages.admin.users.create')->with(compact('user'));
	}
	
	public function store(Request $request) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Perform validation */
		
		$niceNames = [
			'name' => 'Benutzername',
			'email' => 'eMail-Adresse',
			'salutation' => 'Anrede',
			'firstname' => 'Vorname',
			'lastname' => 'Familienname',
			'street' => 'Straße',
			'zipcode' => 'PLZ',
			'city' => 'Ort',
			'phone' => 'Telefon-Nr.',
			'is_administrator' => 'Administrator',
			'password' => 'Kennwort',
		];
		
		$rules = [
			'name' => 'required|unique:users',
			'email' => 'email|unique:users',
			'salutation' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'street' => 'required',
			'zipcode' => 'required',
			'city' => 'required',
			'phone' => 'required',
			'is_administrator' => 'required',
			'password' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Create user */
		
		$input = $request->all();
		
		$user = User::create($request->all());
		$user->password = bcrypt($input['password']);
		$user->is_administrator = !empty($input['is_administrator']);
		$user->save();
		
		$request->session()->flash('message', 'Benutzer erstellt');
		
		/* Redirect back to user list */
		
		return redirect('admin/users');
	}
	
	public function show($id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$user = User::findOrFail($id);
		
		return view('pages.admin.users.show')->with(compact('user'));
	}
	
	public function edit($id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		$user = User::findOrFail($id);
		
		return view('pages.admin.users.edit')->with(compact('user'));
	}
	
	public function update(Request $request, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Perform validation */
		
		$niceNames = [
			'name' => 'Benutzername',
			'email' => 'eMail-Adresse',
			'salutation' => 'Anrede',
			'firstname' => 'Vorname',
			'lastname' => 'Familienname',
			'street' => 'Straße',
			'zipcode' => 'PLZ',
			'city' => 'Ort',
			'phone' => 'Telefon-Nr.',
			'is_administrator' => 'Administrator',
		];
		
		$rules = [
			'name' => 'required|unique:users,id,' . $id,
			'email' => 'email|unique:users,id,' . $id,
			'salutation' => 'required',
			'firstname' => 'required',
			'lastname' => 'required',
			'street' => 'required',
			'zipcode' => 'required',
			'city' => 'required',
			'phone' => 'required',
			'is_administrator' => 'required',
		];
		
		$this->validate($request, $rules, [], $niceNames);
		
		/* Update user */
		
		$input = $request->all();
		
		$user = User::findOrFail($id);
		$user->update($input);
		
		if (isset($input['password']) && !empty($input['password'])) {
			$user->password = bcrypt($input['password']);
		}
		$user->is_administrator = !empty($input['is_administrator']);
		$user->save();
		
		$request->session()->flash('message', 'Benutzer aktualisiert');
		
		/* Redirect back to user list */
		
		return redirect('admin/users');
	}
	
	public function destroy(Request $request, $id) {
		/* Assert user is allowed in here */
		
		if (!Auth::user()->is_administrator) {
			return redirect('/');
		}
		
		/* Delete user */
		
		$user = User::findOrFail($id);
        $user->delete();
		
		$request->session()->flash('message', 'Benutzer gelöscht');

        /* Redirect */
		
        return redirect('admin/users');
	}
}
