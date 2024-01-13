<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data = DB::table('siswa')->join('sekolah', 'sekolah.id', '=','siswa.sekolah_id')->get();
        // $data = DB::select("SELECT * FROM siswa INNER JOIN sekolah ON sekolah.id = siswa.sekolah_id");
        $data = DB::select("SELECT siswa.*, sekolah.nama_sekolah FROM siswa INNER JOIN sekolah ON sekolah.id = siswa.sekolah_id");
        return view('tampil', compact('data'));
        // return view('tampil');
        // return view ('tampil',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Sekolah::all();
        // dd($data);
        return view('tambah',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // Memasukkan data ke database
        // Siswa::create($request->all()); // Cara 1
        /*
        Siswa::create(['nis'=> $request->nis,
                       'nama'=> $request->nama,
                       'alamat' => $request->alamat]); Cara 2 */

        // DB::insert('insert into users (id, name) values (?, ?)', [1, 'Dayle']);
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string|unique:siswa',
            'alamat' => 'required|string',
            'sekolah_id' => 'required'
        ]);
      
        
        try {
            Siswa::create($validator);
            return redirect('siswa')->with('success', 'Data berhasil diisi');
            //code...
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors($validator)->withInput();   //throw $th;
        }
        
        // if (Siswa::where('nis', $request->nis)->orwhere('nama', $request->nama)->orwhere('alamat', $request->alamat)->orwhere('sekolah_id', $request->sekolah_id)->doesntExist()) {
        // } else {
        //     echo '<script type="text/javascript">alert("Data sudah ada")</script>';
        // }


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
        // echo "edit";
        $data = Siswa::findorFail($id);
        // $data = Siswa::find($id);
        // dd($data);
        // // $data = DB::table('siswa')->where('id', '=', $id)->get();
        return view('edit', compact('data'));
        

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        $data = Siswa::findorFail($id);
        // dd($request);
        //
        $validator = $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string',
            'alamat' => 'required'
        ]);
        $data->update($validator);
        // DB::table('siswa')->where('id', $id)->update([
        //     'nis' => $request->nis,
        //     'nama' => $request->nama,
        //     'alamat' => $request->alamat
        // ]);


        return redirect('siswa')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Siswa::destroy($id);
        return redirect('siswa')->with('success', 'Data berhasil dihapus!');

        //
    }
}
