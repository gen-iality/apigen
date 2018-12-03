<?php

namespace App\Http\Controllers;

use App\Escarapela;
use App\Http\Resources\EscarapelaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EscarapelaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 0;
        return EscarapelaResource::collection(
            Escarapela::paginate(config('app.page_size'))
        );
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
        // return '';
        $data = $request->json()->all();
        $result = new Escarapela($data);
        
       
        $result->save();
        return $result;
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Escarapela  $escarapela
     * @return \Illuminate\Http\Response
     */
    public function show(String $id)
    {
        $escarapela = Escarapela::find($id);
        return $escarapela;
        $response = new EscarapelaResource($escarapela);
        return $response;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Escarapela  $escarapela
     * @return \Illuminate\Http\Response
     */
    public function edit(Escarapela $escarapela)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Escarapela  $escarapela
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $id)
    {
        $data = $request->json()->all();
        $escarapela = Escarapela::find($id);
        $escarapela->fill($data);
        $escarapela->save();
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Escarapela  $escarapela
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escarapela $id)
    {
        $res = $id->delete();
        if ($res == true) {
            return 'True';
        } else {
            return 'Error';
        }
    }
}
