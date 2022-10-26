<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\PendaftarBeasiswa;
use App\Models\PenerimaBeasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PenerimaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tahun, $bulan)
    {   
        $showGenerate = false;
        $penerimas = PendaftarBeasiswa::join('penerima_beasiswas', 'pendaftar_beasiswas.id_pendaftar_beasiswas', '=', 'penerima_beasiswas.id_pendaftar_beasiswas')
            ->where("periode_tahun", $tahun)
            ->where("periode_bulan", $bulan)->get();

        $type_menu = "";
        
        if($penerimas->count() == 0){
            $pendaftars = PendaftarBeasiswa::where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();
            if($pendaftars->count() != 0){
                $showGenerate = true;
            }
        }

        return view('penerima.index', compact("type_menu", "penerimas", "tahun", "bulan", "showGenerate"));
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
        //
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
        //
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
        //
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

    public function generate($tahun, $bulan)
    {
        $pendaftars = PendaftarBeasiswa::join('provinsis', 'provinsis.id_provinsis', '=', 'pendaftar_beasiswas.id_provinsis')
                            ->join('kotas', 'kotas.id_kotas', '=', 'pendaftar_beasiswas.id_kotas')
                            ->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();
        
        foreach ($pendaftars as $pendaftar) {
            $total = 0;

            //prvinsi
            $provinsi_tertinggal = array('papua', 'papua barat', 'maluku', 'nusa tenggara barat', 'sumatera utara');
            if(in_array(Str::lower($pendaftar->provinsi), $provinsi_tertinggal)){
                $total += 10;
            }

            //kabupaten
            $kabupaten_tertinggal = array('nias', 'nias selatan', 'nias utara', 'nias barat', 'kepulauan mentawai', 'musi rawas utara',
                'pesisir barat', 'lombok utara', 'sumba barat', 'sumba timur', 'kupang', 'timor tengah selatan',
                'belu', 'alor', 'lembata', 'rote ndao', 'sumba tengah', 'sumba barat daya', 'manggarai timur', 
                'sabu raijua', 'malaka', 'donggala', 'tojo una-una', 'sigi', 'maluku tenggara barat', 'kepulauan aru',
                'seram bagian barat', 'seram bagian timur', 'maluku barat daya', 'buru selatan', 'kepulauan sula', 'pulau talibau',
                'teluk wondama', 'teluk bintuni', 'sorong selatan', 'sorong', 'tambrauw', 'maybrat', 'manokwari selatan',
                'pegunungan arfak', 'jayawijaya', 'nabire', 'paniai', 'puncak jaya', 'boven digoel', 'mappi', 'asmat', 'yahukimo',
                'pegunungan bintang', 'tolikara', 'keerom', 'waropen', 'supiori', 'mamberamo raya', 'nduga', 'lanny jaya',
                'mamberamo tengah', 'yalimo', 'puncak', 'dogiyai', 'intan jaya', 'daiyai');
            if(in_array(Str::lower($pendaftar->kotas), $kabupaten_tertinggal)){
                $total += 10;
            }

            //kondisi rumah
            if(Str::lower($pendaftar->kondisi_rumah) == "Kontrak"){
                $total += 20;
            }

            //ip
            $total += ($pendaftar->ip/4*10);

            //ipk
            $total += ($pendaftar->ipk/4*20);

            //penghasilan_orangtua
            if($pendaftar->penghasilan_orangtua > 2000000){
                $total += 0;
            }else{
                $total += ((2000000 - $pendaftar->penghasilan_orangtua)/2000000*20);
            }

            //tanggungan_orangtua
            if($pendaftar->tanggungan_orangtua > 5){
                $total += 10;
            }else{
                $total += ($pendaftar->tanggungan_orangtua/5*10);
            }

            $findPendaftar = PendaftarBeasiswa::where("id_pendaftar_beasiswas", $pendaftar->id_pendaftar_beasiswas)->first();
            $findPendaftar->nilai_perhitungan = $total;
            $findPendaftar->save();
        }

        $penerimas = PendaftarBeasiswa::join('provinsis', 'provinsis.id_provinsis', '=', 'pendaftar_beasiswas.id_provinsis')
                            ->join('kotas', 'kotas.id_kotas', '=', 'pendaftar_beasiswas.id_kotas')
                            ->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)
                            ->orderBy('nilai_perhitungan', 'DESC')->take(5)->get();
        

        foreach ($penerimas as $penerima) {
            PenerimaBeasiswa::create([
                'id_pendaftar_beasiswas'     => $penerima->id_pendaftar_beasiswas,
            ]);
        }

        return redirect()->route('dashboard.penerimas');
    }
}
