<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guitarvideo extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitarvideos';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_id',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar()
    {
        return $this->belongsTo(Guitar::class, 'guitar_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
