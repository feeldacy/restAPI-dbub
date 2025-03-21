<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class statusTanah extends Model
{
    /** @use HasFactory<\Database\Factories\StatusTanahFactory> */
    use HasFactory;

    protected $table ='status_tanah';

    protected $fillable = [
        'id',
        'nama_status_tanah'];

    public $incrementing = false;
    protected $keyType = 'string';

    public function detailTanah(){
        return $this->hasMany(DetailTanah::class,'status_kepemilikan_id');
    }
}
