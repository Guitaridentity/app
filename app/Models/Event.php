<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'events';

    protected $dates = [
        'start',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'author_id',
        'title',
        'description',
        'start',
        'hours_endurance',
        'price_vod',
        'price_live',
        'link_live',
        'link_vod',
        'percent_to_author',
        'cover_img',
        'cover_video',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }

    public function getStartAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format') . ' ' . config('panel.time_format')) : null;
    }

    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value ? Carbon::createFromFormat(config('panel.date_format') . ' ' . config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
