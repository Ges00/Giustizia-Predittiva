<?php

namespace giustiziapredittiva\Http\Controllers;

use Illuminate\Http\Request;
use giustiziapredittiva\DataLayer;

class SentenzaController extends Controller {

    public function index() {
        return "index sentenze";
    }

    public function create(Request $request) {
        return view("sentenza.createsentenza");
    }

    public function store(Request $request) {
        $dl = new DataLayer();
        $dl->addSentenza($request->input('caso'), $request->input('$decisione'),
                $request->input('$massima'), $request->input('$provvedimento'), 
                $request->input('$corte'), $request->input('$numero_data'), $request->input('$giudice'));
        return Redirect::to(route('index'));
    }

    public function show(Request $request, $id) {
        $dl = new DataLayer();
        if((count($request->all()) != 1) || ($request->get('cat','not_found') == "not_found"))
        {
            return view('errors.queryStringNonValida')->with('messaggio', $request->getQueryString());
        }
        $sentenza = $dl->findSentenzaByID($id);
        if ($sentenza == null) {
            return view('errors.sentenzaNonValida')->with('idSentenza', $id);
        } else {
            $breadcrumb = $dl->buildBreadcrumb($request->input('cat'));
            if($breadcrumb == null)
            {
                return view('errors.categoriaNonValida')->with('idCategoria', $request->input('cat'));
            }

            return view('sentenza.sentenza')->with('sentenza', $sentenza)->with('breadcrumb', $breadcrumb);
        }
    }

    public function edit($id) {
        return "edit sentenze";
    }

    public function update(Request $request, $id) {
        return "update sentenze";
    }

    public function destroy($id) {
        return "destroy sentenze";
    }

}
