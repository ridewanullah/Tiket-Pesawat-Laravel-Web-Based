<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\jadwal;
use App\Http\Resources\jadwal as jadwalResource;


class JadwalController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesawat = jadwal::all();
        return $this->sendResponse(jadwalResource::collection($pesawat), 'Data ditampilkan');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'id_pesawat' => 'required',
            'kursi' => 'required',
            'tanggal' => 'required',
            'harga' => 'required'
        ]);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }
        
        $pesawat = new jadwal();
        $pesawat->id_pesawat = $input['id_pesawat'];
        $pesawat->kursi = $input['kursi'];
        $pesawat->tanggal = $input['tanggal'];
        $pesawat->harga = $input['harga'];
        $pesawat->save();

        return $this->sendResponse(new jadwalResource($pesawat), 'Data ditambahkan!');
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
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesawat = jadwal::find($id);
        if(is_null($pesawat)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new jadwalResource($pesawat), 'Data ditampilkan.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $input = $request->all();

        $pesawat = jadwal::find($id);
        if(!is_null($pesawat)) {
            $validator = Validator::make($input, [
                'id_pesawat' => 'required',
                'kursi' => 'required',
                'tanggal' => 'required',
                'harga' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
    
            $pesawat->id_pesawat = $input['id_pesawat'];
            $pesawat->kursi = $input['kursi'];
            $pesawat->tanggal = $input['tanggal'];
            $pesawat->harga = $input['harga'];
            $pesawat->save();
        }

        return $this->sendResponse(new jadwalResource($pesawat), 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesawat = jadwal::find($id);
        if(!is_null($pesawat)) {
            $pesawat->delete();
        }

        return $this->sendResponse([], 'Data deleted');
    }
}
