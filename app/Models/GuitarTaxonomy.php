<?php

namespace App\Models;

use \DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GuitarTaxonomy extends Model
{
    use SoftDeletes;
    use HasFactory;

    public $table = 'guitar_taxonomies';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'taxonomy_id',
        'value',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function taxonomy()
    {
        return $this->belongsTo(TaxonomieName::class, 'taxonomy_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
