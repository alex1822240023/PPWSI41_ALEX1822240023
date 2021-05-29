<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) values (?, ?, ?, ?, ?, ?)', 
        ['1822240024', 'Ule', 'Palembang', '1999-11-05', 'Jl Sini Situ', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Acuy",
        updated_at = now() where npm = ?', ['1822240023']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240023']);
        dump($result);
    }

    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1822240001',
                'nama_mahasiswa' => 'Ujang',
                'tempat_lahir' => 'Jambi',
                'tanggal_lahir' => '2004-03-11',
                'alamat' => 'Jl Deket',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')->where('npm', '1822240001')->update(  
            [
                'nama_mahasiswa' => 'Sulimin',
                'updated_at' => now()
            ]
        );
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')->where('npm', '=', '1822240001')->delete();
        dump($result);
    }

    public function selectQb()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::table('mahasiswas')->get();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa; // instansiasi class Mahasiswa
        $mahasiswa->npm = '1822240002'; // isi properti
        $mahasiswa->nama_mahasiswa = 'Udin';
        $mahasiswa->tempat_lahir = 'Ujung';
        $mahasiswa->tanggal_lahir = '2010-07-05';
        $mahasiswa->alamat = 'Jl Tetangga';
        $mahasiswa->save(); // menyimpan data ke tabel mahasiswa
        dump($mahasiswa); // lihat isi $mahasiswa
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240002')->first(); // cari data berdasarkan npm
        $mahasiswa->nama_mahasiswa = 'Gicuy';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240002')->first(); // caridata
        $mahasiswa->delete(); // hapus data npm 1822240002
        dump($mahasiswa);
    }

    public function selectElq()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = Mahasiswa::all();
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }
}
