<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\list_pesawat;
use App\Http\Resources\listpesawat as listResource;

class ListPesawatController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = list_pesawat::all();
        return $this->sendResponse(listResource::collection($list), 'Data ditampilkan');
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
            'nama_pesawat' => 'required',
            'kelas' => 'required'
        ]);
        if($validator->fails()) {
            return $this->sendError($validator->errors());
        }

        $list = new list_pesawat();
        $list->nama_pesawat = $input['nama_pesawat'];
        $list->kelas = $input['kelas'];
        $list->save();

        return $this->sendResponse(new listResource($list), 'Data ditambahkan!');
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
     * @param  \App\Models\list_pesawat  $list_pesawat
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $list = list_pesawat::find($id);
        if(is_null($list)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new listResource($list), 'Data Ditampilkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\list_pesawat  $list_pesawat
     * @return \Illuminate\Http\Response
     */
    public function edit(list_pesawat $list_pesawat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\list_pesawat  $list_pesawat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $list = list_pesawat::find($id);
        if(!is_null($list)) {
            $validator = Validator::make($input, [
                'nama_pesawat' => 'required',
                'kelas' => 'required'
            ]);
    
            if($validator->fails()){
                return $this->sendError($validator->errors());       
            }
    
            $list->nama_pesawat = $input['nama_pesawat'];
            $list->kelas = $input['kelas'];
            $list->save();
        }

        return $this->sendResponse(new listResource($list), 'Data diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\list_pesawat  $list_pesawat
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $list = list_pesawat::find($id);
        if(!is_null($list)) {
            $list->delete();
        }

        return $this->sendResponse([], 'Data deleted');
    }
}
