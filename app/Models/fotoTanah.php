<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class fotoTanah extends Model
{
    /** @use HasFactory<\Database\Factories\FotoTanahFactory> */
    use HasFactory;

    protected $table = 'foto_tanah';
    protected $fillable = [
        'id',
        'nama_foto_tanah',
        'ukuran_foto_tanah',
        'detail_tanah_id'
    ];
    public $incrementing = false;
    protected $keyType = 'string';

    public function detailTanah(){
        return $this->belongsTo(DetailTanah::class, 'detail_tanah_id');
    }
}
