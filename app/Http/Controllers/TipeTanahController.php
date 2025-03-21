<?php

namespace App\Http\Controllers;

use App\Models\tipeTanah;
use App\Http\Requests\StoretipeTanahRequest;
use App\Http\Requests\UpdatetipeTanahRequest;
use Illuminate\Http\JsonResponse;

class TipeTanahController extends Controller
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
    public function store(StoretipeTanahRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tipeTanah $tipeTanah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tipeTanah $tipeTanah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatetipeTanahRequest $request, tipeTanah $tipeTanah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tipeTanah $tipeTanah)
    {
        //
    }

    public function getAllTipeTanah(): JsonResponse
    {
        $data = TipeTanah::all(); // Fetch all records
        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
