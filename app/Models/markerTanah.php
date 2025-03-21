<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class markerTanah extends Model
{
    /** @use HasFactory<\Database\Factories\MarkerTanahFactory> */
    use HasFactory;

    protected $table = 'marker_tanah';

    protected $fillable = [
        'id',
        'latitude',
        'longitude',
        'detail_tanah_id'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function groundDetail(){
        return $this->belongsTo(DetailTanah::class, 'detail_tanah_id');
    }

    public function polygonTanah(){
        return $this->hasOne(PolygonTanah::class,'marker_tanah_id');
    }
}
