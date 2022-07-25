<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // public function provinces()
    // {

    //     return Province::all();
    // }

    // public function regencies(Request $request)
    // {
    //     return Regency::find($request->id, ['regency'])->regencies->pluck('name', 'id');
    //     // $provinces_id = $request->provinces_id;
    //     // $regencies = Regency::where('province_id', $provinces_id)->get();

    //     // foreach ($regencies as $regency) {
    //     //     echo "<option value='$regency->id'>$regency->name</option>";
    //     // }
    // }
}
