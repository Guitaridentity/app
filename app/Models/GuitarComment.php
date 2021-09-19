<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarComment extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitar_comments';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_id',
        'user_id',
        'comment',
        'signaled',
        'disabled',
        'likes',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar()
    {
        return $this->belongsTo(Guitar::class, 'guitar_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
