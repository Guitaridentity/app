<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarPurchased extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitar_purchaseds';

    protected $dates = [
        'purchased_date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'owner_id',
        'purchased_date',
        'purchase_price_currency',
        'purchase_price_amount',
        'purchased_who',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function owner()
    {
        return $this->belongsTo(Guitarowner::class, 'owner_id');
    }

    public function getPurchasedDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setPurchasedDateAttribute($value)
    {
        $this->attributes['purchased_date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
