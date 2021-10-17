<?php

use Illuminate\Database\Seeder;
use giustiziapredittiva\User;

class UtentiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $utenteBianchini = new User;
        $utenteBianchini->name = "Devis Bianchini";
        $utenteBianchini->email = "devis.bianchini@unibs.it";
        $utenteBianchini->password = bcrypt("devisSirio77");
        $utenteBianchini->save();
        
        $utenteMatano = new User;
        $utenteMatano->name = "Antonio Matano";
        $utenteMatano->email = "antonio.matano@giustizia.it";
        $utenteMatano->password = bcrypt("jTmEETpPNHqzH9hi");
        $utenteMatano->save();

        $utenteGalante = new User;
        $utenteGalante->name = "Lorenzo Galante";
        $utenteGalante->email = "l.galante@digitaluniversitas.com";
        $utenteGalante->password = bcrypt("g4Ao4RNcfEH7hkix");
        $utenteGalante->save();

        $utenteLentini = new User;
        $utenteLentini->name = "Lorenzo Lentini";
        $utenteLentini->email = "Lorenzo.lentini@giustizia.it";
        $utenteLentini->password = bcrypt("WIt1Q5dVDyh3");
        $utenteLentini->save();        
        
        $utenteCastelli = new User;
        $utenteCastelli->name = "Claudio Castelli";
        $utenteCastelli->email = "claudio.castelli@giustizia.it";
        $utenteCastelli->password = bcrypt("MALl1Zrwa0nyYHiO");
        $utenteCastelli->save();        
    }
}
