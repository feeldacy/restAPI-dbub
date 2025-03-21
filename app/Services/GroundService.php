<?php

    namespace App\Services;

    use App\Models\alamatTanah;
    use App\Models\detailTanah;
    use App\Models\fotoTanah;
    use App\Models\markerTanah;
    use App\Models\polygonTanah;
    use App\Models\sertifikatTanah;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Haruncpi\LaravelIdGenerator\IdGenerator;
    use Illuminate\Support\Facades\Log;


    class GroundService
    {
        public function storeGroundData(array $data)
        {

            return DB::transaction(function () use ($data) {
                Log::info('Mulai menyimpan data', $data);

                // Generate unique IDs
                $alamatTanahID = IdGenerator::generate(['table' => 'alamat_tanah', 'length' => 8, 'prefix' => 'AT-']);
                Log::info('ID AlamatTanah', ['id' => $alamatTanahID]);
                $detailTanahID = IdGenerator::generate(['table' => 'detail_tanah', 'length' => 8, 'prefix' => 'DT-']);
                $markerTanahID = IdGenerator::generate(['table' => 'marker_tanah', 'length' => 8, 'prefix' => 'MT-']);
                $polygonTanahID = IdGenerator::generate(['table' => 'polygon_tanah', 'length' => 8, 'prefix' => 'PT-']);

                // Store Address
                $alamatTanah = AlamatTanah::create([
                    'id' => $alamatTanahID,
                    'detail_alamat' => $data['detail_alamat'],
                    'rt' => $data['rt'],
                    'rw' => $data['rw'],
                    'padukuhan' => $data['padukuhan'],
                ]);

                // Store Ground Details
                $detailTanah = DetailTanah::create([
                    'id' => $detailTanahID,
                    'nama_tanah' => $data['nama_tanah'],
                    'luas_tanah' => $data['luas_tanah'],
                    'alamat_id' => $alamatTanah->id,
                    'status_kepemilikan_id' => $data['status_kepemilikan_id'],
                    'status_tanah_id' => $data['status_tanah_id'],
                    'tipe_tanah_id' => $data['tipe_tanah_id'],
                ]);

                // Store Marker
                $markerTanah = MarkerTanah::create([
                    'id' => $markerTanahID,
                    'latitude' => $data['latitude'],
                    'longitude' => $data['longitude'],
                    'detail_tanah_id' => $detailTanah->id,
                ]);

                Log::info('Marker Tanah:', ['marker' => $markerTanah]);

                Log::info('Data yang akan disimpan ke polygon_tanah:', [
                    'id' => $polygonTanahID,
                    'coordinates' => $data['coordinates'],
                    'marker_id' => $markerTanah->id
                ]);

                // Store Ground
                $polygonTanah = PolygonTanah::create([
                    'id' => $polygonTanahID,
                    'coordinates' => $data['coordinates'],
                    'marker_id' => $markerTanah->id,
                ]);



                // Store Photos if exists
                if (isset($data['foto_tanah'])) {
                    $photoGroundID = IdGenerator::generate(['table' => 'foto_tanah', 'length' => 8, 'prefix' => 'FT-']);
                    $photoName = $data['foto_tanah']->store('ground_image');

                    Log::info("Foto berhasil disimpan", ['name' => $photoName]);

                    FotoTanah::create([
                        'id' => $photoGroundID,
                        'ukuran_foto_tanah' => $data['foto_tanah']->getSize(),
                        'nama_foto_tanah' => $photoName,
                        'detail_tanah_id' => $detailTanah->id,
                    ]);
                }

                // Store Certificates if exists
                if (isset($data['sertifikat_tanah'])) {
                    $sertificateGroundID = IdGenerator::generate(['table' => 'sertifikat_tanah', 'length' => 8, 'prefix' => 'ST-']);
                    $sertifName = $data['sertifikat_tanah']->store('ground_sertificate');

                    Log::info("Sertifikat berhasil disimpan", ['name' => $sertifName]);

                    SertifikatTanah::create([
                        'id' => $sertificateGroundID,
                        'ukuran_sertifikat_tanah' => $data['sertifikat']->getSize(),
                        'nama_sertifikat_tanah' => $sertifName,
                        'detail_tanah_id' => $detailTanah->id,
                    ]);
                }

                return ['message' => 'Data berhasil ditambahkan'];
            });
        }
    }
?>
