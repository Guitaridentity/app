<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarPurchaseWhere extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitar_purchase_wheres';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'town',
        'province',
        'state',
        'country',
        'zip',
        'latitude',
        'longitude',
        'guitar_purchase_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar_purchase()
    {
        return $this->belongsTo(GuitarPurchased::class, 'guitar_purchase_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
