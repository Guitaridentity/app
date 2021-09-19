<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MotherPicture extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'mother_pictures';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'mother_id',
        'url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function mother()
    {
        return $this->belongsTo(Mother::class, 'mother_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
