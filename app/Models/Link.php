<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['original_url', 'shortened_url', 'visits'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
