<?php

use Illuminate\Database\Seeder;
use giustiziapredittiva\DataLayer;

class checkErrors extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contents = Storage::disk('sentenze')->get('Sentenze_1.txt');
        $contents .= Storage::disk('sentenze')->get('Sentenze_2.txt');
        $contents .= Storage::disk('sentenze')->get('Sentenze_3.txt');
        $contents .= Storage::disk('sentenze')->get('Sentenze_4.txt');
        $contents .= Storage::disk('sentenze')->get('Sentenze_5.txt');
        $contents .= Storage::disk('sentenze')->get('Sentenze_6.txt'); // ERRORE
        
        // Espressioni regolari
        $tribunale_RegExp = '/^[0-9]+[)]\s+(Tribunale)\s+(di)\s+(Brescia)/';
        $corteAppello_RegExp = '/^[0-9]+[)]\s+(Corte)\s+(di)\s+(Appello)\s+(di)\s+(Brescia)/';
        $keyword_RegExp = '/^(Parole)\s+(chiave)$/';
        $link_provvedimento_RegExp = '/^(Link)\s+(al)\s+(provvedimento)$/';
        $link_decisione_RegExp = '/^(Link)\s+(alla)\s+(decisione)$/';
        $link_massima_RegExp = '/^(Link)\s+(alla)\s+(massima)$/';
        $link_caso_RegExp = '/^(Link)\s+(al)\s+(caso)$/';
        
        $array_contents = explode("\r", $contents);

        $numRows = count($array_contents);

        $accumulatore_di_stringhe = "";
        $parole_chiave = array();
        $provvedimenti = array();
        $provvedimentoNotFound = true;
        $decisioni = array();
        $decisioneNotFound = true;
        $massime = array();
        $massimaNotFound = true;
        $casi = array();
        $casoNotFound = true;
        $tabelle = array();
        $intestazioni = array();

        for ($i = $numRows; $i > 0; $i--) {
            if (preg_match($keyword_RegExp, trim($array_contents[$i - 1]))) {
                $parole_chiave[] = $accumulatore_di_stringhe;
                $accumulatore_di_stringhe = "";
            } else if ((preg_match($link_provvedimento_RegExp, trim($array_contents[$i - 1]))) && ($provvedimentoNotFound)) {
                $provvedimenti[] = $accumulatore_di_stringhe;
                $provvedimentoNotFound = false;
                $accumulatore_di_stringhe = "";
            } else if ((preg_match($link_decisione_RegExp, trim($array_contents[$i - 1]))) && ($decisioneNotFound)) {
                $decisioni[] = $accumulatore_di_stringhe;
                $decisioneNotFound = false;
                $accumulatore_di_stringhe = "";
            } else if ((preg_match($link_massima_RegExp, trim($array_contents[$i - 1]))) && ($massimaNotFound)) {
                $massime[] = $accumulatore_di_stringhe;
                $massimaNotFound = false;
                $accumulatore_di_stringhe = "";
            } else if ((preg_match($link_caso_RegExp, trim($array_contents[$i - 1]))) && ($casoNotFound)) {
                $casi[] = $accumulatore_di_stringhe;
                $casoNotFound = false;
                $accumulatore_di_stringhe = "";
            } else if ((preg_match($tribunale_RegExp, trim($array_contents[$i - 1]))) || (preg_match($corteAppello_RegExp, trim($array_contents[$i - 1])))) {
                $tabelle[] = $accumulatore_di_stringhe;
                $intestazioni[] = trim($array_contents[$i - 1]);
                $accumulatore_di_stringhe = "";
                $provvedimentoNotFound = true;
                $decisioneNotFound = true;
                $massimaNotFound = true;
                $casoNotFound = true;
            } else {
                $accumulatore_di_stringhe = $array_contents[$i - 1] . " " . $accumulatore_di_stringhe;
            }
        }

        echo "###########################################################\n\n";
        echo "###########################################################\n\n";
        echo "###########################################################\n\n";
        echo "###########################################################\n\n";
        echo "###########################################################\n\n";
        echo "###########################################################\n\n";

        $tabelle = array_reverse($tabelle);
        $separatore_RegExp = '/(\s*(Link)\s+(al)\s+(caso)\s*|\s*(Link)\s+(al)\s+(provvedimento)\s*|\s*(Link)\s+(alla)\s+(massima)\s*|\s*(Link)\s+(alla)\s+(decisione)\s*)/';

        $dl = new DataLayer();
        
        foreach ($tabelle AS $key => $value) {
            $righe_raw = explode("Link al caso", $value);
            $righe = array();
            for ($i = 0; $i < count($righe_raw) - 1; $i++) {
                $righe_raw[$i] = trim(preg_replace($separatore_RegExp, "", $righe_raw[$i]));
                if (!preg_match('/^\s*$/', $righe_raw[$i])) {
                    $righe[] = $righe_raw[$i];
                }
            }

            $falseTrovato = false;
            $stringaOutput = "";
            foreach ($righe as $key => $riga) {
                //$accumulatore[] = $riga;
                $items = explode(">", $riga);
                $id_padre = 1;
                for ($i=0;$i<count($items)-1;$i++) {
                    $categoria = $dl->findCategoryByName($items[$i], $id_padre);
                    if($categoria) {
                        $id_padre = $categoria->id;
                        $stringaOutput = $stringaOutput . $categoria->id . ") " . $categoria->nome . " => ";
                    } else {
                        $falseTrovato = true;
                        $stringaOutput = $stringaOutput . "FALSE => ";
                    }
                }
                if($falseTrovato)
                {
                    echo "%%%%%%%%%%%%%%%%%%%\n\n";
                    echo $riga . "\n\n";
                    echo $stringaOutput . "\n\n";
                    $stringaOutput = "";
                    $falseTrovato = false;
                }
            }
        }
    }
}
