<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use giustiziapredittiva\Categoria;
use giustiziapredittiva\DataLayer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Caricamento delle categorie
         */
        $contents = Storage::disk('sentenze')->get('Categorie.txt');
        $array_contents = explode("\n", $contents);
        
        // Espressione regolare
        $incipit = '/(\*)+(>)\s+/';
        $dl = new DataLayer();
        $elenco_categorie = array();
        $elenco_categorie[] = ["nome" => "TOP", "livello" => 0];
        
        foreach($array_contents as $key=>$value)
        {
            $livello_categoria = strlen(trim(explode(">",$value)[0]));
            $nome_categoria = preg_replace($incipit, "", $value);
            $elenco_categorie[] = ["nome" => $nome_categoria, "livello" => $livello_categoria];
        }
        
        foreach($elenco_categorie as $key=>$value) {
            $categoria = new Categoria;
            $categoria->nome = $value["nome"];
            if($value["livello"] === 0) {
                $categoria->id_categoria_padre = 0;
            } else if($value["livello"] === 1)
            {
                $categoria->id_categoria_padre = 1;
            } else {
                $i = $key-1;
                $trovato = false;
                while($i>=0 && !$trovato) {
                    if($value["livello"] == ($elenco_categorie[$i]["livello"]+1))
                    {
                        $trovato = true;
                        $categoria->id_categoria_padre = $i+1;
                    }
                    $i--;
                }
            }
            $categoria->save();
        }
    }
}
