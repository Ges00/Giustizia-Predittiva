<?php

namespace giustiziapredittiva\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use giustiziapredittiva\DataLayer;

class PredizioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "index predizione";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dl = new DataLayer();
        $sentenze = $dl->getAllSentenze();
        return view("predizione.createPredizione")->with('id_padre', $request->input("id"))->with('sentenze', $sentenze);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dl = new DataLayer();
        $request->validate([
            'se_allora' => 'required',
            'id_sentenza' => 'required',
        ]);
        $dl->addPredizione($request->input("se_allora"), $request->input("id_sentenza"), $request->input("id_padre"));
        return Redirect::to(route('categoryChildren', $request->input('id_padre')));
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
    public function destroy($id, $id_padre)
    {
        $dl = new DataLayer();
        $dl->deletePredizione($id);
        return Redirect::to(route('categoryChildren', $id_padre));
    }
    
    public function confirmDestroy($id, $id_padre){   
        //$dl = new DataLayer();
        //$predizione = $dl->findPredictionFromId($id);
        return view('predizione.deletePredizione')->with('id_pred', $id)->with('id_padre', $id_padre);
    }
}
