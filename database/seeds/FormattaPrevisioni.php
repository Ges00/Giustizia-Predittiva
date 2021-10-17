<?php

use Illuminate\Database\Seeder;
use giustiziapredittiva\Predizione;

class FormattaPrevisioni extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allPredizioni = Predizione::all();
        
        //echo count($allPredizioni) . "\n\n";
        
        foreach($allPredizioni AS $key => $value) {
            
            $stringa_da_formattare = $value->se_allora;
            
            $contatore_SE = substr_count($stringa_da_formattare, "SE");
            
            $pb_trovato = false;
            
            if($contatore_SE !== 1) {
                echo $value->id . " --> " . $contatore_SE . " occorrenze SE\n";
                $pb_trovato = true;
            } else
            {
                $stringa_da_formattare = str_replace("SE", "<p><b>SE</b>", $stringa_da_formattare);
            }
                
            $contatore_ALLORA = substr_count($stringa_da_formattare, "ALLORA");
                
            if($contatore_ALLORA !== 1) {
                echo $value->id . " --> " . $contatore_ALLORA . " occorrenze ALLORA\n";
                $pb_trovato = true;
            } else {
                $stringa_da_formattare = str_replace("ALLORA", "<p><b>ALLORA</b>", $stringa_da_formattare);
            }
            
            if($pb_trovato)
            {
                echo "(problemi riscontrati nella predizione " . $value->id . ", categoria " . $value->id_categoria . ")\n";
                echo "\n";
            } else {
                $value->se_allora = $stringa_da_formattare;
                $value->save();
            }
            //echo str_replace("SE", "<b>SE</b>", $value->se_allora) . "\n\n";
            
            //echo str_replace("ALLORA", "<p><b>ALLORA</b>", $value->se_allora) . "\n\n";
            
            //echo $value->id . "\n\n";
        }
        
        //$prova = "se mi prendi per le intese allora ti cazzio!";
        //echo str_replace(" se ", "<b>SE</b>", $prova) . "\n\n";
    }
}
