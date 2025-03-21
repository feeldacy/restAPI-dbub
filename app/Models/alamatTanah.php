<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class alamatTanah extends Model
{
    /** @use HasFactory<\Database\Factories\AlamatTanahFactory> */
    use HasFactory;

    protected $table = 'alamat_tanah';
    protected $fillable = [
        'id',
        'detail_alamat',
        'rt',
        'rw',
        'padukuhan'
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    public function groundDetails()
    {
        return $this->hasMany(DetailTanah::class, 'alamat_id');
    }
}
