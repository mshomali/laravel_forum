<?php

namespace App\Http\Controllers;

use App\Models\Reply;
use App\Models\Thread;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, $channel, Thread $thread)
	{
		$thread->addReply([
			'user_id' => auth()->id(),
			'body'    => $request->body,
		]);

		return back();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Reply $reply
	 * @return \Illuminate\Http\Response
	 */
	public function show(Reply $reply)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Reply $reply
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Reply $reply)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Models\Reply        $reply
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Reply $reply)
	{
		//
	}


	/**
	 * @param Reply $reply
	 * @return \Illuminate\Contracts\Routing\ResponseFactory|
	 * \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 * @throws \Exception
	 */
	public function destroy(Reply $reply)
	{
		$this->authorize('update', $reply);

		if($reply->favorites){
			$reply->favorites()->delete();
		}

		$reply->delete();

		return back();
	}
}
