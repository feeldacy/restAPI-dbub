<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGroundRequest;
use App\Services\GroundService;
use App\Services\polygon_tanahervice;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Log as FacadesLog;

class GroundController extends Controller
{

    protected $groundService;

    public function __construct(GroundService $groundService)
    {
        $this->groundService = $groundService;
    }

    /**
     * Display a listing of the resource.
     */
    public function fetchAllData()
    {
        // Fetch data using leftJoins
        $groundData = DB::table('detail_tanah')
            ->leftJoin('marker_tanah', 'detail_tanah.id', '=', 'marker_tanah.detail_tanah_id')
            ->leftJoin('polygon_tanah', 'marker_tanah.id', '=', 'polygon_tanah.marker_id')
            ->leftJoin('status_tanah', 'detail_tanah.status_tanah_id', '=', 'status_tanah.id')
            ->leftJoin('status_kepemilikan', 'detail_tanah.status_kepemilikan_id', '=', 'status_kepemilikan.id')
            ->leftJoin('tipe_tanah', 'detail_tanah.tipe_tanah_id', '=', 'tipe_tanah.id')
            ->leftJoin('foto_tanah', 'detail_tanah.id', '=', 'foto_tanah.detail_tanah_id')
            ->leftJoin('sertifikat_tanah', 'detail_tanah.id', '=', 'sertifikat_tanah.detail_tanah_id')
            ->leftJoin('alamat_tanah', 'alamat_tanah.id', '=', 'detail_tanah.alamat_id')
            ->select(
                'detail_tanah.id as detail_tanah_id',
                'alamat_tanah.detail_alamat as alamat',
                'foto_tanah.nama_foto_tanah as foto_tanah',
                'sertifikat_tanah.nama_sertifikat_tanah as sertifikat_tanah',
                'detail_tanah.nama_tanah',
                'detail_tanah.luas_tanah',
                'status_kepemilikan.nama_status_kepemilikan',
                'tipe_tanah.nama_tipe_tanah',
                "marker_tanah.latitude",
                "marker_tanah.longitude"
            )
            ->get();

        return response()->json([
            'status' => 'success',
            'data' => $groundData
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGroundRequest $request)
    {
        try {
            $result = $this->groundService->storeGroundData($request->validated());

            return response()->json(['success' => true, 'message' => $result['message']]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan data.',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // dd($request->all());
            Log::info('Raw Request:', ['input' => file_get_contents('php://input')]);

            Log::info('Request yang diterima:', $request->all());
            $result = $this->groundService->updateGroundData($id, $request->all());

            return response()->json(['success' => true, 'message' => $result['message']]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan saat menyimpan data.',
                'message' => $e->getMessage(),
                'trace' => $e->getTrace()
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $result = $this->groundService->deleteGround($id);

        if (!$result['success']) {
            return response()->json(['message' => $result['message']], 404);
        }

        return response()->json(['success' => true, 'message' => $result['message']], 200);
    }
}
