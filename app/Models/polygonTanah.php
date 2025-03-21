<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class polygonTanah extends Model
{
    /** @use HasFactory<\Database\Factories\PolygonTanahFactory> */
    use HasFactory;

    protected $table = 'polygon_tanah';
    protected $fillable = [
        'id',
        'coordinates',
        'marker_id'
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function marker()
    {
        return $this->belongsTo(MarkerTanah::class, 'marker_id');
    }
}
