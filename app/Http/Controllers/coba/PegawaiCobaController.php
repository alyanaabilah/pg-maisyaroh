<?php

namespace App\Http\Controllers\coba;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiCobaController extends Controller
{
    public function index()
    { $pegawai = Pegawai::all();
        return view('admin.pegawai.index',[
            "orang" => $pegawai,
            "title" => "Pegawai"
        ]);
    }

    public function create()
    {
        return view('admin.pegawai.create-index', [
            "orang" => Pegawai::all(),
            "title" => "Tambah Data"
        ]);
    }

    public function store(Request $request)
    {
        // $peg = new Pegawai;
        // $peg->nama = $request->input('nama');
        // $peg->ktp = $request->input('ktp');
        // $peg->alamat = $request->input('alamat');
        // $peg->save();
        $validatedData = $request->validate([
            'nama' => 'required',
            'ktp' => 'required',
            'alamat' => 'required'
        ]);
        Pegawai::create($validatedData);

        return redirect('admin/pegawai-coba')->with('success', 'Data Pegawai Ditambahkan');

    }
}
