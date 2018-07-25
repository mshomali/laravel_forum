<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use function Sodium\crypto_box_publickey_from_secretkey;

class Favorite extends Model
{
    protected $guarded = [];

	public function favorites()
	{
		return $this->morphTo();
	}
}

