<?php

namespace App\Http\Controllers;

use App\Imports\PendaftarBeasiswasImport;
use App\Models\Kota;
use App\Models\PendaftarBeasiswa;
use App\Models\Provinsi;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class PendaftarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tahun, $bulan)
    {
        $type_menu = "";
        $pendaftars = PendaftarBeasiswa::with("provinsiModel", "kota")->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();
        return view('pendaftar.index', compact("type_menu", "pendaftars", "tahun", "bulan"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $type_menu = "";
        $provinsis = Provinsi::all();
        $check = PendaftarBeasiswa::with("provinsiModel", "kota")->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->whereNull("nilai_perhitungan")->first();
        $check2 = PendaftarBeasiswa::with("provinsiModel", "kota")->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->first();
        if(($check)==null && $check2!=null){
            $now = Carbon::now();
            $tahuns = $now->year;
            $bulans = $now->month;
            return redirect()->route('dashboard.pendaftar.list',[$tahuns,$bulans])->with('success', 'Periode pendaftaran sudah ditutup.');
        }else{
            return view('pendaftar.tambah', compact("type_menu","provinsis", "tahun", "bulan"));
        }
    }

    public function getKota($id=0)
    {
        $tempData['data'] = Kota::where('id_provinsis',$id)->get();
        return response()->json($tempData);
    }

    public function import(Request $request){
        // Excel::import(new PendaftarBeasiswa(), $request->file('file')->store('files'));
        // return redirect()->back();

        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
    
        $file = $request->file('file');
        $nama_file = rand().$file->getClientOriginalName();
        $file->move('file_pendaftar',$nama_file);
        $datas = Excel::toCollection(new PendaftarBeasiswasImport, public_path('/file_pendaftar/'.$nama_file));
        foreach($datas[0] as $pendaftar){
            $new = new PendaftarBeasiswa();
            $new->nama = $pendaftar['nama'];
            $new->kelamin = $pendaftar['kelamin'];
            $new->nik = $pendaftar['nik'];
            $new->telpon = $pendaftar['telpon'];
            $new->alamat = $pendaftar['alamat'];
            $new->id_provinsis = $pendaftar['id_provinsis'];
            $new->id_kotas = $pendaftar['id_kotas'];
            $new->kondisi_rumah = $pendaftar['kondisi_rumah'];
            $new->ip = $pendaftar['ip'];
            $new->ipk = $pendaftar['ipk'];
            $new->penghasilan_orangtua = $pendaftar['penghasilan_orangtua'];
            $new->tanggungan_orangtua = $pendaftar['tanggungan_orangtua'];
            $new->periode_tahun = $request->periode_tahun;
            $new->periode_bulan = $request->periode_bulan;
            $new->save();
        }
        return redirect()->route('dashboard.pendaftar.list',[$request->periode_tahun,$request->periode_bulan])->with('success', 'Pendaftar beasiswa telah berhasil ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'nik' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'id_provinsis' => 'required',
            'id_kotas' => 'required',
            'kondisi_rumah' => 'required',
            'ip' => 'required',
            'ipk' => 'required',
            'penghasilan_orangtua' => 'required',
            'tanggungan_orangtua' => 'required',
            'periode_tahun' => 'required',
            'periode_bulan' => 'required',
        ]);
        
        $new = new PendaftarBeasiswa();
        $new->nama = $request->nama;
        $new->kelamin = $request->kelamin;
        $new->nik = $request->nik;
        $new->telpon = $request->telpon;
        $new->alamat = $request->alamat;
        $new->id_provinsis = $request->id_provinsis;
        $new->id_kotas = $request->id_kotas;
        $new->kondisi_rumah = $request->kondisi_rumah;
        $new->ip = $request->ip;
        $new->ipk = $request->ipk;
        $new->penghasilan_orangtua = $request->penghasilan_orangtua;
        $new->tanggungan_orangtua = $request->tanggungan_orangtua;
        $new->periode_tahun = $request->periode_tahun;
        $new->periode_bulan = $request->periode_bulan;
        $new->save();

        return redirect()->route('dashboard.pendaftar.list',[$request->periode_tahun,$request->periode_bulan])->with('success', 'Pendaftar beasiswa telah berhasil ditambahkan.');
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
    public function edit($id)
    {
        $type_menu = "";
        $provinsis = Provinsi::all();
        $pendaftar = PendaftarBeasiswa::with("provinsiModel", "kota")->find($id);
        return view('pendaftar.edit', compact("type_menu", "provinsis", "pendaftar"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelamin' => 'required',
            'nik' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'id_provinsis' => 'required',
            'id_kotas' => 'required',
            'kondisi_rumah' => 'required',
            'ip' => 'required',
            'ipk' => 'required',
            'penghasilan_orangtua' => 'required',
            'tanggungan_orangtua' => 'required',
        ]);
        
        $new = PendaftarBeasiswa::find($id);
        $new->nama = $request->nama;
        $new->kelamin = $request->kelamin;
        $new->nik = $request->nik;
        $new->telpon = $request->telpon;
        $new->alamat = $request->alamat;
        $new->id_provinsis = $request->id_provinsis;
        $new->id_kotas = $request->id_kotas;
        $new->kondisi_rumah = $request->kondisi_rumah;
        $new->ip = $request->ip;
        $new->ipk = $request->ipk;
        $new->penghasilan_orangtua = $request->penghasilan_orangtua;
        $new->tanggungan_orangtua = $request->tanggungan_orangtua;
        $new->save();

        return redirect()->route('dashboard.pendaftar.list',[$request->periode_tahun,$request->periode_bulan])->with('success', 'Data pendaftar beasiswa telah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lapak = PendaftarBeasiswa::find($id);
        $lapak->delete();

        $now = Carbon::now();
        $tahuns = $now->year;
        $bulans = $now->month;
        return redirect()->route('dashboard.pendaftar.list',[$tahuns,$bulans])->with('success', 'Berhasil menghapus data pendaftar beasiswa.');
    }
}
