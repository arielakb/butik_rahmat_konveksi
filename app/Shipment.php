<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public const PENDING = 'pending';
	public const SHIPPED = 'shipped';

    /**
	 * Relationship to the order model
	 *
	 * @return void
	 */
	public function order()
	{
		return $this->belongsTo(Order::class);
	}
}
