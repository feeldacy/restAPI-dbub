<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGroundRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // Detail Tanah Validate Data Rules
            'nama_tanah' => 'required|string',
            'luas_tanah' => 'required|numeric',

            // Marker Tanah Validate Data Rules
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',

            // Polygon Tanah Validate Data Rule
            'coordinates' => 'nullable|json',

            // Alamat Tanah Validate Data Rules
            'detail_alamat' => 'required|string',
            'rt' => 'required|string',
            'rw' => 'required|string',
            'padukuhan' => 'required|string',

            // Foto Tanah Validate Data Rules
            'foto_tanah' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',

            // Sertifikat Validate Data Rules
            'sertifikat_tanah' => 'nullable|file|mimes:pdf,doc,docx|max:5120',

            // Status Kepemilikan Validate Data Rules
            'status_kepemilikan_id' => 'required|string',

            // Status Tanah Validate Data Rules
            'status_tanah_id' => 'required|string',

            // Tipe Tanah Validate Data Rules
            'tipe_tanah_id' => 'required|string',
        ];
    }
}
