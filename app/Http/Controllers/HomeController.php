<?php

namespace giustiziapredittiva\Http\Controllers;

//use Illuminate\Http\Request;
use giustiziapredittiva\DataLayer;
use Tree\Node\Node;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void

      public function __construct()
      {
      $this->middleware('auth');
      }
     * 
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dl = new DataLayer();
        $categoryLavoro = $dl->findCategoriaLavoro();
        $categoryImprese = $dl->findCategoriaImprese();
        return view('index')->with('lavoro', $categoryLavoro)->with('imprese', $categoryImprese);
    }

    // FUNZIONE CREATA DA DIEGO BERARDI
    public function myIndex() {
        $dl = new DataLayer();
        $categoryLavoro = $dl->findCategoriaLavoro();
        $categoryImprese = $dl->findCategoriaImprese();
        //$root = $dl->getCategoryTree(1);
        /* $childrens = $root->getChildren();
          foreach($childrens as $child){
          echo $child->getValue()."  ";
          }
          exit(); */
        //$this->showTreeRecursive($root);
        //exit();
        session_start();

        if (isset($_SESSION['logged'])) {
            return view('index')->with('lavoro', $categoryLavoro)->with('imprese', $categoryImprese)
                            ->with('logged', true)->with('loggedName', $_SESSION['loggedName']);
        } else {
            return view('index')->with('lavoro', $categoryLavoro)->with('imprese', $categoryImprese)
                            ->with('logged', false);
        }
    }

    /*function showTreeRecursive($node) {
        echo "<ul>";
        $childrens = $node->getChildren();
        foreach ($childrens as $child) {
            echo "<li>" . $child->getValue() . "</li>";
            $this->showTreeRecursive($child);
        }
        echo "</ul>";
    }*/

}
