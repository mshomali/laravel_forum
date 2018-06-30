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
 * @property User $User
 * @property string $body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Reply extends Model
{
	//relations
	public function owner()
	{
		return $this->belongsTo(User::class, 'user_id');
    }
}
