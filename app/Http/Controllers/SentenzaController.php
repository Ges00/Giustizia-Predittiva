<?php

namespace giustiziapredittiva\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use giustiziapredittiva\DataLayer;

class SentenzaController extends Controller {

    public function index() {
        return "index sentenze";
    }

    public function create(Request $request) {
        return view("sentenza.createsentenza")->with('id', $request->input("id"));
    }

    public function store(Request $request) {
        $dl = new DataLayer();
        //echo "DEBUGGING SENTENZA STORE";
        //echo $request->input("caso");
        //exit();

        $request->validate([
            //'caso' => 'required',
            //'decisione' => 'required',
            //'massima' => 'required',
            //'provvedimento' => 'required',
            'corte' => 'required',
            'numero_data' => 'required',
            'giudice' => 'required',
        ]);
        $dl->addSentenza($request->input("caso"), $request->input("decisione"),
                $request->input("massima"), $request->input("provvedimento"),
                $request->input("corte"), $request->input("numero_data"), $request->input("giudice"));
        return Redirect::to(route('home'));
    }

    public function show(Request $request, $id) {
        $dl = new DataLayer();
        session_start();
        if ((count($request->all()) != 1) || ($request->get('cat', 'not_found') == "not_found")) {
            return view('errors.queryStringNonValida')->with('messaggio', $request->getQueryString());
        }
        $sentenza = $dl->findSentenzaByID($id);
        if ($sentenza == null) {
            return view('errors.sentenzaNonValida')->with('idSentenza', $id);
        } else {
            $breadcrumb = $dl->buildBreadcrumb($request->input('cat'));
            if ($breadcrumb == null) {
                return view('errors.categoriaNonValida')->with('idCategoria', $request->input('cat'));
            }
            if (isset($_SESSION['logged'])) {
                return view('sentenza.sentenza')->with('sentenza', $sentenza)->with('breadcrumb', $breadcrumb)->with('logged', $_SESSION['logged'])->with('id_cat', $id)->with('id_padre', $request->input("cat"));
            }
            return view('sentenza.sentenza')->with('sentenza', $sentenza)->with('breadcrumb', $breadcrumb)->with('logged', false);
        }
    }

    public function edit($id, $id_padre) {
        $dl = new DataLayer();
        $sent_to_edit=$dl ->findSentenzaByID($id);
        return view('sentenza.modificaSentenza')->with('sent_to_edit', $sent_to_edit)->with('id', $id)->with('id_padre', $id_padre);
    }

    public function update(Request $request, $id, $id_padre) {
        $dl = new DataLayer();
        $dl->updateSentenza($request->input("caso"), $request->input("decisione"),
                $request->input("massima"), $request->input("provvedimento"),
                $request->input("corte"), $request->input("numero_data"), $request->input("giudice"), $id);

        return Redirect::to(route('categoryChildren',$id_padre));
    }

    public function destroy($id, $id_padre) {
        $dl = new DataLayer();
        //echo "destroying sentenza: ";
        //echo $id;
        //echo $predizioni;
        //exit();
        $dl->deleteSentenza($id);
        return Redirect::to(route('categoryChildren',$id_padre));
    }

    public function confirmDestroy($id, $id_padre) {
        $dl = new DataLayer();

        $sentenza = $dl->findSentenzaByID($id);
        $predizioni = $dl->findPredictionsFromIdSentenza($id);
        // il problema è questo return, ovvero il modo in cui viene ritornata la view
        return view('sentenza.deleteSentenza')->with('id_padre', $id_padre)->with('id_sentenza', $id)->with('numero_data', $sentenza->numero_data)->with('predizioni', $predizioni);
    }

}
