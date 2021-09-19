<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guitarowner extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitarowners';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'hix',
        'user_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitarOwnerGuitars()
    {
        return $this->hasMany(Guitar::class, 'guitar_owner_id', 'id');
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
