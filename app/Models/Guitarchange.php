<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guitarchange extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitarchanges';

    protected $dates = [
        'date_change',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_owner_id',
        'description',
        'date_change',
        'done_by',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar_owner()
    {
        return $this->belongsTo(Guitarowner::class, 'guitar_owner_id');
    }

    public function getDateChangeAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateChangeAttribute($value)
    {
        $this->attributes['date_change'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
