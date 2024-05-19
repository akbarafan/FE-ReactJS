<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Http\Requests\StoreGuruRequest;
use App\Http\Requests\UpdateGuruRequest;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::get();
        $siswa = Siswa::get();
        $kelas = Kelas::get();

        $data = array(
            'gurus' => $guru,
            'siswas' => $siswa,
            'kelass' => $kelas
        );

        return view('template.home', $data);
    }

    public function deleteGuru(Request $request){
        $data = Guru::find($request->id);
        $data->delete();

        return redirect('/');
    }

    public function form(Request $request)
    {
        $kelas = Kelas::get();
        $data = array(
            'kelass' => $kelas
        );

        return view('template.tambah', $data);
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
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'mata_pelajaran' => 'required'
        ]);

        if ($validate) {
            $guru = new Guru();
            $guru->nama = $request->nama;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->kelas_id = $request->kelas;
    
            $guru->save();
    
            return redirect('/');
        }else{
            
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $kelas = Kelas::get();
        $guru = Guru::find($request->id);

        $data = array(
            'kelass' => $kelas,
            'guru' => $guru
        );

        return view('template.tambah', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'mata_pelajaran' => 'required'
        ]);

        if ($validated) {
            $guru = Guru::find($request->id);
            $guru->nama = $request->nama;
            $guru->mata_pelajaran = $request->mata_pelajaran;
            $guru->kelas_id = $request->kelas;
    
            $guru->save();

            return redirect('/');
        }else{
            
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGuruRequest $request, Guru $guru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Guru $guru)
    {
        //
    }
}
