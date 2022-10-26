<?php

namespace App\Http\Controllers;

use App\Models\PendaftarBeasiswa;
use App\Models\PenerimaBeasiswa;
use Illuminate\Http\Request;

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
}
