<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

    protected $guarded = ['id','created_at','updated_at'];

    public function getStatusAttribute()
    {
        return $this->attributes['status'] == 0 ? 'Inactive' : 'Active';
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
