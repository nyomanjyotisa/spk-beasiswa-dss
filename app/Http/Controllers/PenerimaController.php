<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Data;
use App\Models\PendaftarBeasiswa;
use App\Models\PenerimaBeasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        $showGenerate = 0;
        $penerimas = PendaftarBeasiswa::join('penerima_beasiswas', 'pendaftar_beasiswas.id_pendaftar_beasiswas', '=', 'penerima_beasiswas.id_pendaftar_beasiswas')
            ->where("periode_tahun", $tahun)
            ->where("periode_bulan", $bulan)->get();

        $type_menu = "";
        
        if($penerimas->count() == 0){
            $pendaftars = PendaftarBeasiswa::where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();
            if($pendaftars->count() != 0){
                $showGenerate = 1;
            }else{
                $showGenerate = 2;
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
        $type_menu = "";
        return view('penerima.show', compact("type_menu"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $jumlah_penerima = Data::where('label', 'jumlah_penerima_per_periode')->first();
        $pendaftars = PendaftarBeasiswa::join('provinsis', 'provinsis.id_provinsis', '=', 'pendaftar_beasiswas.id_provinsis')
                            ->join('kotas', 'kotas.id_kotas', '=', 'pendaftar_beasiswas.id_kotas')
                            ->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();
        
        $bobotProvTertinggal = Atribut::where('nama', 'provinsi')->first()->bobot;
        $bobotKabTertinggal = Atribut::where('nama', 'kota')->first()->bobot;
        $bobotRumah = Atribut::where('nama', 'kondisi_rumah')->first()->bobot;
        $bobotIP = Atribut::where('nama', 'ip')->first()->bobot;
        $bobotIPK = Atribut::where('nama', 'ipk')->first()->bobot;
        $bobotPenghasilan = Atribut::where('nama', 'penghasilan_orangtua')->first()->bobot;
        $bobotTanggungan = Atribut::where('nama', 'tanggungan_orangtua')->first()->bobot;


        foreach ($pendaftars as $pendaftar) {
            $total = 0;

            //prvinsi
            if(Atribut::where('nama', 'provinsi')->first()->status == 1){
                $provinsi_tertinggal = array('papua', 'papua barat', 'maluku', 'nusa tenggara barat', 'sumatera utara');
                if(in_array(Str::lower($pendaftar->provinsi), $provinsi_tertinggal)){
                    $total += $bobotProvTertinggal*2/2;
                }else{
                    $total += $bobotProvTertinggal*1/2;
                }
            }

            //kabupaten
            if(Atribut::where('nama', 'kota')->first()->status == 1){
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
                    $total += $bobotKabTertinggal*2/2;
                }else{
                    $total += $bobotKabTertinggal*1/2;
                }
            }

            //kondisi rumah
            
            if(Atribut::where('nama', 'kondisi_rumah')->first()->status == 1){
                if(Str::lower($pendaftar->kondisi_rumah) == "kontrak"){
                    $total += $bobotRumah*2/2;
                }else{
                    $total += $bobotRumah*1/2;
                }
            }

            //ip
            
            if(Atribut::where('nama', 'ip')->first()->status == 1){
                if($pendaftar->ip > 3.75){
                    $total += $bobotIP*5/5;
                }else if($pendaftar->ip > 3.25){
                    $total += $bobotIP*4/5;
                }else if($pendaftar->ip > 3.00){
                    $total += $bobotIP*3/5;
                }else if($pendaftar->ip > 2.75){
                    $total += $bobotIP*2/5;
                }else{
                    $total += $bobotIP*1/5;
                }
            }

            //ipk
            if(Atribut::where('nama', 'ipk')->first()->status == 1){
                if($pendaftar->ipk > 3.75){
                    $total += $bobotIPK*5/5;
                }else if($pendaftar->ipk > 3.25){
                    $total += $bobotIPK*4/5;
                }else if($pendaftar->ipk > 3.00){
                    $total += $bobotIPK*3/5;
                }else if($pendaftar->ipk > 2.75){
                    $total += $bobotIPK*2/5;
                }else{
                    $total += $bobotIPK*1/5;
                }
            }

            //penghasilan_orangtua
            if(Atribut::where('nama', 'penghasilan_orangtua')->first()->status == 1){
                if($pendaftar->penghasilan_orangtua < 800000){
                    $total += $bobotPenghasilan*4/4;
                }else if($pendaftar->penghasilan_orangtua < 1500000){
                    $total += $bobotPenghasilan*3/4;
                }else if($pendaftar->penghasilan_orangtua < 3000000){
                    $total += $bobotPenghasilan*2/4;
                }else{
                    $total += $bobotPenghasilan*1/4;
                }
            }

            //tanggungan_orangtua
            if(Atribut::where('nama', 'tanggungan_orangtua')->first()->status == 1){
                if($pendaftar->tanggungan_orangtua == 1){
                    $total += $bobotTanggungan*5/5;
                }else if($pendaftar->tanggungan_orangtua == 2){
                    $total += $bobotTanggungan*4/5;
                }else if($pendaftar->tanggungan_orangtua == 3){
                    $total += $bobotTanggungan*3/5;
                }else if($pendaftar->tanggungan_orangtua == 4){
                    $total += $bobotTanggungan*2/5;
                }else{
                    $total += $bobotTanggungan*1/5;
                }
            }

            $findPendaftar = PendaftarBeasiswa::where("id_pendaftar_beasiswas", $pendaftar->id_pendaftar_beasiswas)->first();
            $findPendaftar->nilai_perhitungan = $total;
            $findPendaftar->save();
        }

        $penerimas = PendaftarBeasiswa::join('provinsis', 'provinsis.id_provinsis', '=', 'pendaftar_beasiswas.id_provinsis')
                            ->join('kotas', 'kotas.id_kotas', '=', 'pendaftar_beasiswas.id_kotas')
                            ->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)
                            ->orderBy('nilai_perhitungan', 'DESC')->take($jumlah_penerima->value)->get();
        

        foreach ($penerimas as $penerima) {
            PenerimaBeasiswa::create([
                'id_pendaftar_beasiswas'     => $penerima->id_pendaftar_beasiswas,
            ]);
        }

        return redirect()->back();
    }

    public function regenerate($tahun, $bulan)
    {
        $pendaftars = PendaftarBeasiswa::join('provinsis', 'provinsis.id_provinsis', '=', 'pendaftar_beasiswas.id_provinsis')
                            ->join('kotas', 'kotas.id_kotas', '=', 'pendaftar_beasiswas.id_kotas')
                            ->where("periode_tahun", $tahun)->where("periode_bulan", $bulan)->get();

        foreach ($pendaftars as $pendaftar) {
            PenerimaBeasiswa::where('id_pendaftar_beasiswas', $pendaftar->id_pendaftar_beasiswas)->delete();
        }
        return redirect()->back();
    }
}
