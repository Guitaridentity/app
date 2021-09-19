<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarHardware extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'guitar_hardware';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'guitar_id',
        'guitar_production_year',
        'country_produced_id',
        'body_shape_id',
        'top_material_id',
        'neck_material_id',
        'fretboard_material_id',
        'body_finish_id',
        'hardware_finish_id',
        'bridge_type_id',
        'pickup_number',
        'pickup_configuration',
        'pickup_neck_id',
        'pickup_center_id',
        'pickup_bridge_id',
        'is_left_handed',
        'decription',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function guitar()
    {
        return $this->belongsTo(Guitar::class, 'guitar_id');
    }

    public function country_produced()
    {
        return $this->belongsTo(Country::class, 'country_produced_id');
    }

    public function body_shape()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'body_shape_id');
    }

    public function top_material()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'top_material_id');
    }

    public function neck_material()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'neck_material_id');
    }

    public function fretboard_material()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'fretboard_material_id');
    }

    public function body_finish()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'body_finish_id');
    }

    public function hardware_finish()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'hardware_finish_id');
    }

    public function bridge_type()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'bridge_type_id');
    }

    public function pickup_neck()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'pickup_neck_id');
    }

    public function pickup_center()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'pickup_center_id');
    }

    public function pickup_bridge()
    {
        return $this->belongsTo(GuitarTaxonomy::class, 'pickup_bridge_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
