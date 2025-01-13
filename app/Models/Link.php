<?php

namespace App\Models;

use App\Traits\HasStatuses;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Link extends Model
{
    use SoftDeletes, HasStatuses;

    protected $fillable = [
        'title',
        'description',
        'original_url',
        'shortened_url',
        'user_id',
        'visits',
        'favicon',
    ];

    public const ACTIVE_STATUS = 'active';
    public const DRAFTED_STATUS = 'drafted';

    public const STATUSES = [
        self::ACTIVE_STATUS,
        self::DRAFTED_STATUS,
    ];

    protected $appends = [
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format(config('panel.datetime_format'));
    }
}
