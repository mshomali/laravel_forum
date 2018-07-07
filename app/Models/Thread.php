<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder;

/**
 * Class Thread
 *
 * @package App\Models
 * @property integer $id
 * @property string  $title
 * @property string  $body
 * @property Reply[] $Replies
 * @property User    $Owner
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 *
 * Scopes:
 * @method static Builder Mine()
 */
class Thread extends Model
{
	protected $guarded = [];

	//relations
	public function replies()
	{
		return $this->hasMany(Reply::class);
	}

	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function channel()
	{
		return $this->belongsTo(Channel::class);
	}


	// functions
	public function addReply($reply)
	{
		$this->replies()->create($reply);
	}

	public function path()
	{
		return '/threads/' . $this->channel->name . '/' . $this->id;
	}


	//scopes
	public function scopeMine(Builder $query, $user_id)
	{
		return $query->where('user_id', $user_id);
	}
}
