<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function prevSlide()
	{
		return self::where('position', '<', $this->position)
			->orderBy('position', 'DESC')
			->first();
	}

	public function nextSlide()
	{
		return self::where('position', '>', $this->position)
			->orderBy('position', 'ASC')
			->first();
	}
}