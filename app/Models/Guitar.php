<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guitar extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitars';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_type_id',
        'guitar_brand_id',
        'guitar_brand_model_id',
        'serial',
        'guitar_color_id',
        'strings_number',
        'certified',
        'cert_code',
        'to_sell',
        'to_sell_price',
        'guitar_owner_id',
        'image_url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public static function boot()
    {
        parent::boot();
        Guitar::observe(new \App\Observers\GuitarActionObserver());
    }

    public function guitarGuitarHardware()
    {
        return $this->hasMany(GuitarHardware::class, 'guitar_id', 'id');
    }

    public function guitarGuitarComments()
    {
        return $this->hasMany(GuitarComment::class, 'guitar_id', 'id');
    }

    public function guitar_type()
    {
        return $this->belongsTo(GuitarType::class, 'guitar_type_id');
    }

    public function guitar_brand()
    {
        return $this->belongsTo(GuitarBrand::class, 'guitar_brand_id');
    }

    public function guitar_brand_model()
    {
        return $this->belongsTo(GuitarBrandModel::class, 'guitar_brand_model_id');
    }

    public function guitar_color()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'guitar_color_id');
    }

    public function guitar_owner()
    {
        return $this->belongsTo(Guitarowner::class, 'guitar_owner_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
