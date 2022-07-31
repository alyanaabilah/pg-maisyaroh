<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;

class MyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::with(['province', 'regency', 'district', 'village'])->where('id', auth()->user()->id)->get();
        return view('front.my-profile', [
            "title" => "Pangkalan Gas Maisyaroh | Profil",
            "active" => "my-profile",
            "users" => $user,
            "judul" => "My Profile",
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $province_id = $request->province_id;
        $regencies = Regency::where('province_id', $province_id)->get();


        foreach ($regencies as $regency) {
            echo "<option value = '$regency->id'>$regency->name</option>";
        }
        // $data['regencies'] = Regency::where("province_id", $request->province_id)
        //     ->get(["name", "id"]);
        // return response()->json($data);
    }

    public function getRegencies(Request $request)
    {
        $regency_id = $request->regency_id;
        $districts = District::where('regency_id', $regency_id)->get();


        foreach ($districts as $district) {
            echo "<option value = '$district->id'>$district->name</option>";
        }
    }

    public function getDistricts(Request $request)
    {
        $district_id = $request->district_id;
        $villages = Village::where('district_id', $district_id)->get();


        foreach ($villages as $village) {
            echo "<option value = '$village->id'>$village->name</option>";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user_id = Auth::user()->id;
        $user = User::with(['province', 'regency', 'district', 'village'])->findOrFail($user_id);
        // $user = User::with(['province', 'regency', 'district', 'village'])->where('id', auth()->user()->id)->get();

        $provinces = Province::all();

        return view('front.my-profile-edit', [
            "title" => "Pangkalan Gas Maisyaroh | Edit",
            "active" => "my-profile",
            "user" => $user,
            "judul" => "My Profile Edit",
            "provinces" => $provinces,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        // $user = User::where('id', Auth::id()->first());
        // $rules = [
        //     'name' => 'required|string',
        //     'username' => 'required|string',
        //     'addres' => 'required|string',
        //     'province_id' => 'required',
        //     'regency_id' => 'required',
        //     'district_id' => 'required',
        //     'village_id' => 'required',
        //     'zip_code' => 'integer',
        //     'phone_number' => 'required|string',
        //     'country' => 'string',
        // ];
        // $validatedData = $request->validate($rules);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->addres = $request->input('addres');
        $user->province_id = $request->input('province');
        $user->regency_id = $request->input('regency');
        $user->district_id = $request->input('district');
        $user->village_id = $request->input('village');
        $user->zip_code = $request->input('zip_code');
        $user->phone_number = $request->input('phone_number');
        $user->update();
        // User::where('id', $user->id)
        //     ->update($validatedData);
        return redirect('user/my-profile')->with('success', 'Berhasil Edit Profil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
