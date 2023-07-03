<?php

namespace App\Http\Controllers;

use App\Models\reservasi;
use Illuminate\Http\Request;

class reservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return reservasi::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $sold = new reservasi();
        $sold->id_jadwal = $request->id_jadwal;
        $sold->save();

        return "Data ditambahkan";
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
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(reservasi $reservasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $id_jadwal = $request->id_jadwal;

        $sold = reservasi::find($id);
        $sold->id_jadwal = $id_jadwal;
        $sold->save();

        return "Data Terupdate";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $sold = reservasi::find($id);
        $sold->delete();

        return "Data Terhapus";
    }
}
