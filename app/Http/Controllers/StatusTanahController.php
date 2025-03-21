<?php

namespace App\Http\Controllers;

use App\Models\statusTanah;
use App\Http\Requests\StorestatusTanahRequest;
use App\Http\Requests\UpdatestatusTanahRequest;
use Illuminate\Http\JsonResponse;

class StatusTanahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StorestatusTanahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(statusTanah $statusTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(statusTanah $statusTanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatusTanahRequest $request, statusTanah $statusTanah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(statusTanah $statusTanah)
    {
        //
    }

    public function getAllStatusTanah(): JsonResponse
    {
        $data = StatusTanah::all(); // Fetch all records
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
