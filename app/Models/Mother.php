<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mother extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'mothers';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'guitar_type_id',
        'guitar_brand_id',
        'guitar_brand_model_id',
        'guitar_color_id',
        'strings_number',
        'image_url',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function motherMotherHardware()
    {
        return $this->hasMany(MotherHardware::class, 'mother_id', 'id');
    }

    public function motherMotherComments()
    {
        return $this->hasMany(MotherComment::class, 'mother_id', 'id');
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

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
