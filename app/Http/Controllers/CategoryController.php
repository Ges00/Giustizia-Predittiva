<?php

namespace giustiziapredittiva\Http\Controllers;

//use Illuminate\Http\Request;
use giustiziapredittiva\DataLayer;

class CategoryController extends Controller {

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
