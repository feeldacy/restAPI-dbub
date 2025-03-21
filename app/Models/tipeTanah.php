<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class tipeTanah extends Model
{
    /** @use HasFactory<\Database\Factories\TipeTanahFactory> */
    use HasFactory;


    protected $table ='tipe_tanah';

    protected $fillable = [
        'id',
        'nama_tipe_tanah'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function detailTanah(){
        return $this->hasMany(DetailTanah::class,'status_kepemilikan_id');
    }
}
