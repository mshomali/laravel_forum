<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Thread
 *
 * @package App\Models
 * @property integer $id
 * @property string $title
 * @property string $body
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Thread extends Model
{
	//relations
	public function replies()
	{
		return $this->hasMany(Reply::class);
    }
}
