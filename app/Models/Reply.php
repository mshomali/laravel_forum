<?php

namespace App\Models;

use App\Traits\RecordsActivity;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Reply
 *
 * @package App\Models
 * @property integer    $id
 * @property integer    $user_id
 * @property User       $Owner
 * @property string     $body
 * @property Favorite[] $favorites
 * @property Carbon     $created_at
 * @property Carbon     $updated_at
 */
class Reply extends Model
{

	use RecordsActivity;

	protected $guarded = [];

	//relations
	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function favorites()
	{
		return $this->morphMany('App\Models\Favorite', 'favorite');
	}

	public function thread()
	{
		return $this->belongsTo(Thread::class);
	}


	// Functions
	public function isFavorited()
	{
		return $this->favorites()->where('user_id', auth()->id())->exists();
	}

	public function path()
	{
		return $this->thread->path() . "#reply-{$this->id}";
	}
}
