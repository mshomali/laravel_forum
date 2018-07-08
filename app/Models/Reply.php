<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Reply
 *
 * @package App\Models
 * @property integer $id
 * @property integer $user_id
 * @property User    $Owner
 * @property string  $body
 * @property Carbon  $created_at
 * @property Carbon  $updated_at
 */
class Reply extends Model
{
	protected $guarded = [];

	//relations
	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
	}

	public function favorites()
	{
		return $this->morphMany(Favorite::class, 'favorite_id');
	}
}
