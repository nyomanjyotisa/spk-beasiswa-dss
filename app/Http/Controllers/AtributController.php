<?php

namespace App\Http\Controllers;

use App\Models\Atribut;
use App\Models\Data;
use Illuminate\Http\Request;

class AtributController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $atributs = Atribut::get();
        $totalBobot = Atribut::where('status', 1)->sum('bobot');
        $data = Data::where('label', 'jumlah_penerima_per_periode')->first();
        
        $type_menu = "";

        return view('atribut.index', compact("type_menu", "atributs", "totalBobot", "data"));
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
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function show(Atribut $atribut)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $atribut = Atribut::find($id);
        $type_menu = "";
        return view('atribut.edit', compact("type_menu", "atribut"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bobot' => 'required',
        ]);

        $data['bobot']=$request->bobot;

        $atribut = Atribut::find($id);
        if($request->filled('status')){
            $data['status']=1;
        }else{
            $data['status']=0;
        }
        $atribut->update($data);
       
        return redirect()->route('dashboard.pengaturan.list')
                        ->with('success','Berhasil mengubah data atribut');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atribut  $atribut
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atribut $atribut)
    {
        //
    }

    public function jumlah_penerima(Request $request)
    {
        $request->validate([
            'jumlah_penerima_per_periode' => 'required',
        ]);

        $data['label']='jumlah_penerima_per_periode';
        $data['value']=$request->jumlah_penerima_per_periode;

        $atribut = Data::where('label', 'jumlah_penerima_per_periode')->first();
        $atribut->update($data);
       
        return redirect()->route('dashboard.pengaturan.list')
                        ->with('success','Berhasil mengubah data jumlah penerima');
    }
}
