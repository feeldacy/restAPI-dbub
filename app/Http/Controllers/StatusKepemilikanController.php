<?php

namespace App\Http\Controllers;

use App\Models\statusKepemilikan;
use App\Http\Requests\StorestatusKepemilikanRequest;
use App\Http\Requests\UpdatestatusKepemilikanRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class StatusKepemilikanController extends Controller
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
    public function store(StorestatusKepemilikanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(statusKepemilikan $statusKepemilikan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(statusKepemilikan $statusKepemilikan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatestatusKepemilikanRequest $request, statusKepemilikan $statusKepemilikan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(statusKepemilikan $statusKepemilikan)
    {
        //
    }

    public function getAllStatusKepemilikan(): JsonResponse
    {
        $data = StatusKepemilikan::all(); // Fetch all records
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
