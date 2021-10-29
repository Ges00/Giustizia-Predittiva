<?php

namespace giustiziapredittiva;

use Illuminate\Support\Facades\DB;
use giustiziapredittiva\Categoria;
use giustiziapredittiva\Sentenza;
use giustiziapredittiva\Keyword;

class DataLayer {

    public function findCategoryByName($cat_name, $id_padre) {
        $categories = DB::table('Categoria')->where('id_categoria_padre', $id_padre)->get();
        foreach ($categories as $cat) {
            if (($this->pulisciStringa($cat->nome)) == ($this->pulisciStringa($cat_name))) {
                return $cat;
            }
        }
        return false;
    }

    public function findCategoryChildrenByID($id) {
        $categoryChildren = Categoria::where('id_categoria_padre', $id)->orderBy('nome', 'asc')->get();
        return $categoryChildren;
    }

    public function findCategoriaLavoro() {
        $lavoro = DB::table('Categoria')->where('nome', 'Diritto del lavoro')->where('id_categoria_padre', 1)->get();

        return $lavoro[0];
    }

    public function findCategoriaImprese() {
        $imprese = DB::table('Categoria')->where('nome', 'Diritto delle imprese')->where('id_categoria_padre', 1)->get();

        return $imprese[0];
    }

    public function findCategoryByID($id) {
        return Categoria::find($id);
    }

    public function buildBreadcrumb($id) {
        $categoria = $this->findCategoryByID($id);

        if ($categoria == null) {
            return null;
        }
        $breadcrumb[] = $categoria;

        $id_padre = $categoria->id_categoria_padre;
        while ($id_padre !== 1) {
            $categoria = $this->findCategoryByID($id_padre);
            $breadcrumb[] = $categoria;
            $id_padre = $categoria->id_categoria_padre;
        }

        return array_reverse($breadcrumb);
    }

    public function findSentenzaByID($id) {
        return Sentenza::find($id);
    }

    public function findCategoriesFromIdPadre($id) {
        return DB::table('Categoria')->where('id_categoria_padre', $id)->get();
    }

    public function keywordFound($parola) {
        $keywords = DB::table('Keyword')->where('nome_codificato', $this->pulisciStringa($parola))->get();
        if (count($keywords) > 0) {
            return $keywords[0];
        } else {
            return false;
        }
    }

    public function addKeyword($parola) {
        $existingKeyword = $this->keywordFound($parola);
        if (!$existingKeyword) {
            $keyword = new Keyword;
            $keyword->nome = trim($parola);
            $keyword->nome_codificato = $this->pulisciStringa($parola);
            $keyword->save();
            return $keyword->id;
        } else {
            return $existingKeyword->id;
        }
    }

    public function addSentenza($caso, $decisione, $massima, $provvedimento, $corte, $numero_data, $giudice) {
        $new_sentenza = new Sentenza;
        $new_sentenza->caso = $caso;
        $new_sentenza->decisione = $decisione;
        $new_sentenza->massima = $massima;
        $new_sentenza->provvedimento = $provvedimento;
        $new_sentenza->corte = $corte;
        $new_sentenza->numero_data = $numero_data;
        $new_sentenza->giudice = $giudice;
        $new_sentenza->save();
    }

    public function addCategoria($nome, $dettagli, $id_padre) {
        $new_categoria = new Categoria;
        $new_categoria->nome = $nome;
        $new_categoria->dettagli = $dettagli;
        $new_categoria->id_categoria_padre = $id_padre;
        $new_categoria->save();
    }
    
    public function addPredizione($se_allora, $id_sentenza, $id_padre){
        $new_predizione = new Predizione;
        $new_predizione->se_allora = $se_allora;
        $new_predizione->id_sentenza = $id_sentenza;
        $new_predizione->id_categoria = $id_padre;
        $new_predizione->save();
    }

    public function updateSentenza($caso, $decisione, $massima, $provvedimento, $corte, $numero_data, $giudice, $id) {
        $sentenza = $this->findSentenzaByID($id);
        if ($caso != null)
        //echo $sentenza->caso ;
            $sentenza->caso = $caso;
        if ($decisione != null)
        //echo "decisione";
            $sentenza->decisione = $decisione;
        if ($massima != null)
        //echo"massima";
            $sentenza->massima = $massima;
        if ($provvedimento != null)
        //echo"provv";
            $sentenza->provvedimento = $provvedimento;
        if ($corte != null)
        //echo "corte";
            $sentenza->corte = $corte;
        if ($numero_data != null)
        //echo("numero data");
            $sentenza->numero_data = $numero_data;
        if ($giudice != null)
        //echo("sentenza");
            $sentenza->giudice = $giudice;
        //echo "updating";
        //exit();
        $sentenza->save();
    }

    public function deleteSentenza($id) {
        $predizioni = $this->findPredictionsFromIdSentenza($id);
        DB::table('Keyword_sentenza')->where('sentenza_id', $id)->delete();
        foreach ($predizioni as $pred) {
            Predizione::find($pred->id)->delete();
        }
        Sentenza::find($id)->delete();
    }
    
    /*
    public function deleteCategoria($id) {
        echo "deleting categories";
        $categorie_figlie = $this->findCategoriesFromIdPadre($id);
        foreach ($categorie_figlie as $cat) {
            Predizione::findOrFail($cat->id)->delete();
            Categoria::find($cat->id)->delete();
        }
        Categoria::find($id)->delete();
    }*/

    public function deleteCategorieRecursive($id) {
        $categorie_figlie = $this->findCategoriesFromIdPadre($id);
        // AGGIUNGERE ELIMINAZIONE PREDIZIONI ASSOCIATE ALLE CATEGORIE
        if ($categorie_figlie != null) {
            foreach ($categorie_figlie as $cat) {
                //Predizione::findOrFail($cat->id)->delete();
                $this->deleteCategorieRecursive($cat->id);
            }
        }
        Predizione::where('id_categoria', $id)->delete();
        Categoria::find($id)->delete();
        return;
    }

    public function deletePredizione($id){
        Predizione::find($id)->delete();
    }
    
    public function findPredictionsFromIdSentenza($id_sentenza) {
        $predizioni = DB::table('Predizione')->where('id_sentenza', $id_sentenza)->get();
        return $predizioni;
    }

    public function findPredictions($id_categoria) {
        $predizioni = DB::table('Predizione')->where('id_categoria', $id_categoria)->get();
        return $predizioni;
    }
    
    public function findPredictionFromId($id_predizione){
        $predizione = DB::table('Predizione')->where('id', $id_predizione)->get();
        return $predizione;
    }
    
    public function getAllSentenze(){
        return DB::table('Sentenza')->get();
    }

    private function pulisciStringa($stringa) {
        $output = strtolower(preg_replace('/[^A-Za-z0-9]/', '', $stringa));

        return $output;
    }

    public function validUser($username, $password) {
        return (User::where('name', '=', $username)->where('password', '=', md5($password))->count() > 0);
    }

}
