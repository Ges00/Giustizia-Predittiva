<?php

use Illuminate\Database\Seeder;
use giustiziapredittiva\Sentenza;
use giustiziapredittiva\DataLayer;
use giustiziapredittiva\Predizione;

class SentenzeSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $sorgenti = ['Sentenze_1.txt', 'Sentenze_2.txt', 'Sentenze_3.txt', 'Sentenze_4.txt',
            'Sentenze_5.txt', 'Sentenze_6.txt'];
        
        for($i=0; $i<count($sorgenti);$i++) {
            $this->generaSentenze($sorgenti[$i]);
        }
        //$contents = Storage::disk('sentenze')->get('Sentenze_1.txt'); // 4 sentenze, 4 previsioni
        //$contents = Storage::disk('sentenze')->get('Sentenze_2.txt'); // 12 sentenze, 12 previsioni
        //$contents = Storage::disk('sentenze')->get('Sentenze_3.txt'); // 6 sentenze, 6 previsioni
        //$contents = Storage::disk('sentenze')->get('Sentenze_4.txt'); // 5 sentenze, 5 previsioni
        //$contents = Storage::disk('sentenze')->get('Sentenze_5.txt'); // 4 sentenze, 4 previsioni
        //$contents = Storage::disk('sentenze')->get('Sentenze_6.txt'); // 20 sentenze, 65 previsioni
    }
    
    private function generaSentenze($file) {
                
        $contents = Storage::disk('sentenze')->get($file); // 20 sentenze, 65 previsioni

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
        $separatore_RegExp = '/(\s*(Link)\s+(al)\s+(caso)\s*|\s*(Link)\s+(al)\s+(provvedimento)\s*|\s*(Link)\s+(alla)\s+(massima)\s*|\s*(Link)\s+(alla)\s+(decisione)\s*)/';

        $sentenze = array();

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

        $intestazioni = array_reverse($intestazioni);
        $tabelle = array_reverse($tabelle);
        $casi = array_reverse($casi);
        $massime = array_reverse($massime);
        $decisioni = array_reverse($decisioni);
        $provvedimenti = array_reverse($provvedimenti);
        $parole_chiave = array_reverse($parole_chiave);
        
        $dl = new DataLayer();
        
        // una intestazione = una sentenza
        foreach ($intestazioni AS $key => $value) {
            if(preg_match($tribunale_RegExp, $value))
            {
                $corte = "Tribunale di Brescia";
            } else {
                $corte = "Corte di Appello di Brescia";
            }    
            
            $numero_data = trim(explode("(",trim(explode("-",$value)[1]))[0]);
            
            $giudice = explode("(",$value);
            $giudice = substr($giudice[1], 0, strlen($giudice[1])-1);
            
            $sentenza = new Sentenza;
            $sentenza->corte = $corte;
            $sentenza->numero_data = $numero_data;
            $sentenza->giudice = $giudice;
            $sentenza->caso = $casi[$key];
            $sentenza->massima = $massime[$key];
            $sentenza->decisione = $decisioni[$key];
            $sentenza->provvedimento = $provvedimenti[$key];
            $sentenza->save();
            $ultima_sentenza = $sentenza->id;
            
            $righe_raw = explode("Link al caso", $tabelle[$key]);
            $righe = array();
            
            for ($i = 0; $i < count($righe_raw) - 1; $i++) {
                $righe_raw[$i] = trim(preg_replace($separatore_RegExp, "", $righe_raw[$i]));
                if (!preg_match('/^\s*$/', $righe_raw[$i])) {
                    $righe[] = $righe_raw[$i];
                }
            }
            
            // una riga = una predizione
            foreach ($righe as $index => $riga) {
                $items = explode(">", $riga);
                $id_padre = 1;
                for ($i=0;$i<count($items)-1;$i++) {
                    $categoria = $dl->findCategoryByName($items[$i], $id_padre);
                    if($categoria) {
                        $id_padre = $categoria->id;
                    } 
                }
                $predizione = new Predizione;
                $predizione->se_allora = preg_replace('/^(Predizione)\s+/', '', trim($items[count($items)-1]));
                $predizione->id_sentenza = $ultima_sentenza;
                $predizione->id_categoria = $id_padre;
                $predizione->save();
            }
            
            $keyword_per_sentenza = array();
            $keyword_per_sentenza = explode(" - ", $parole_chiave[$key]);
            
            foreach ($keyword_per_sentenza as $keyword) {
                $ultima_parola = $dl->addKeyword($keyword);
                // TODO: collegare la keyword alla sentenza
                $sentenza->keywords()->attach($ultima_parola);
            }
        }
    }
}
