<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventUser extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'event_users';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'event_id',
        'user',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
