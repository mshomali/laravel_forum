<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
	public function show(User $user)
	{
		return view('Profiles.show')->with([
			'profile_user' => $user,
			'threads'      => $user->threads()->paginate(10),
		]);
	}
}
