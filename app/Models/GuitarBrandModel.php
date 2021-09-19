<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarBrandModel extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitar_brand_models';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_brand_id',
        'name',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar_brand()
    {
        return $this->belongsTo(GuitarBrand::class, 'guitar_brand_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
