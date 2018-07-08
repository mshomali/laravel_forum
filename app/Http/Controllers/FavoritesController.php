<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reply;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}


	/**
	 * @param Reply $reply
	 *
	 */
	public function store(Reply $reply)
	{
		$reply->favorites()->create([
			'user_id'        => auth()->id(),
			'favorited_id'   => $reply->id,
			'favorited_type' => get_class($reply),
		]);
	}
}
