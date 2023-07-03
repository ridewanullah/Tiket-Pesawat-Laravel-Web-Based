<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\reservasi;
use App\Http\Resources\reservasi as reservasiResource;



class ReservasiController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sold = reservasi::all();
        return $this->sendResponse(reservasiResource::collection($sold), 'Data ditampilkan');
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
            'id_jadwal'=>'required'
        ]);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $sold = new reservasi();
        $sold->id_user = $input['id_user'];
        $sold->id_jadwal = $input['id_jadwal'];
        $sold->save();
        return $this->sendResponse(new reservasiResource($sold), 'Data ditambahkan!');
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
    public function show($id)
    {
        $sold = reservasi::find($id);
        if(is_null($sold)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new reservasiResource($sold), 'Data ditampilkan.');
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
        $input = $request->all();

        $sold = reservasi::find($id);
        if(!is_null($sold)) {
            $validator = Validator::make($input, [
                'id_jadwal' => 'required',
                'id_user' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
    
            $sold->id_user = $input['id_user'];
            $sold->id_jadwal = $input['id_jadwal'];
            $sold->save();
        }

        return $this->sendResponse(new reservasiResource($sold), 'Data updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    //public function delete($id)
    //{
    //    //$sold = reservasi::find($id);
    //    //$sold->delete();

    //    //return "Data Terhapus";
    //}

    public function destroy($id) {
        $sold = reservasi::find($id);
        if(!is_null($sold)) {
            $sold->delete();
        }
        return $this->sendResponse([], 'Data deleted');
    }
}
