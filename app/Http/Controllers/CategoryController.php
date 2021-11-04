<?php

namespace giustiziapredittiva\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use giustiziapredittiva\DataLayer;

class CategoryController extends Controller {

    public function index(){
        return "index category";
    }
    
    public function create(Request $request){
        return view("categoria.createCategoria")->with('id_padre', $request->input("id"));
    }
    
    public function store(Request $request){
        $dl = new DataLayer();
        $request->validate([
            'nome' => 'required',
        ]);
        $dl->addCategoria($request->input("nome"), $request->input("dettagli"), $request->input("id_padre"));
        return Redirect::to(route('categoryChildren', $request->input('id_padre')));
    }
    
    public function show(){
        return "show category";
    }
    
    public function edit($id){
        return "edit category";
    }
    
    public function update(Request $request, $id){
        return "update category";
    }
    
    public function destroy($id){
        $dl = new DataLayer();
        //echo "destroying sentenza: ";
        //echo $id;
        //echo $predizioni;
        //exit();
        $dl->deleteCategorieRecursive($id);
        return Redirect::to(route('home'));
    }
    
    public function confirmDestroy($id){
    
        $dl = new DataLayer();

        $categoria = $dl->findCategoryByID($id);
        $categorie_figlie = $dl->findCategoriesFromIdPadre($id);
        $predizioni = $dl ->findPredictions($id);
        // $predizioni = $dl->findPredictionFromIdCatRecursive($id);
        // il problema è questo return, ovvero il modo in cui viene ritornata la view
        return view('categoria.deleteCategoria')->with('nome', $categoria->nome)
                ->with('id_categoria', $id)->with('categorie_figlie', $categorie_figlie)->with('predizioni', $predizioni);
    
    }
    
    public function children($id) {
        session_start();
        $dl = new DataLayer();
        $categoriaPadre = $dl->findCategoryByID($id);
        if ($categoriaPadre == null) {
            return view('errors.categoriaNonValida')->with('idCategoria', $id);
        } else {
            $categoryChildren = $dl->findCategoryChildrenByID($id);
            $breadcrumb = $dl->buildBreadcrumb($id);
            $predizioni = $dl->findPredictions($id);
            if(isset($_SESSION['logged'])){
                return view('categorie')->with('superCategory', $categoriaPadre)->with('categoryList', $categoryChildren)->with('breadcrumb', $breadcrumb)
                    ->with('predizioni', $predizioni)->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
            } else{
                return view('categorie')->with('superCategory', $categoriaPadre)->with('categoryList', $categoryChildren)->with('breadcrumb', $breadcrumb)
                    ->with('predizioni', $predizioni)->with('logged', false)->with('loggedName', NULL);
            }
        }
        
    }

    public function lavoro() {
        $dl = new DataLayer();
        $categoryLavoro = $dl->findCategoriaLavoro();
        $categoriaLavoroChildren = $dl->findCategoryChildrenByID($categoryLavoro->id);

        return view('lavoro')->with('categoryList', $categoriaLavoroChildren);
    }

    public function imprese() {
        $dl = new DataLayer();
        $categoryImprese = $dl->findCategoriaImprese();
        $categoriaImpreseChildren = $dl->findCategoryChildrenByID($categoryImprese->id);

        return view('imprese')->with('categoryList', $categoriaImpreseChildren);
    }

}
