<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::all();
        // $data = null;
        return view('tampil', compact('data'));
        // return view ('tampil',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambah');
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Memasukkan data ke database
        // Siswa::create($request->all()); // Cara 1
        /*
        Siswa::create(['nis'=> $request->nis,
                       'nama'=> $request->nama,
                       'alamat' => $request->alamat]); Cara 2 */

        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required'
        ]);
        if (Siswa::where('nis', $request->nis)->doesntExist()) {
            Siswa::create($validator);
            return redirect('siswa')->with('success', 'Data berhasil diisi');
        } else {
            echo '<script type="text/javascript">alert("Data sudah ada")</script>';
            return redirect()->back()->withErrors($validator)->withInput();
        }


        // DB::table('siswa')->where('nis', $request->nis)

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
        $data = Siswa::findorFail($id);
        // $data = DB::table('siswa')->where('id', '=', $id)->get();
        // dd($data);
        return view('edit', compact('data'));


        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        //
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required'
        ]);

        DB::table('siswa')->where('id', $id)->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'alamat' => $request->alamat
        ]);
        return redirect('siswa')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
