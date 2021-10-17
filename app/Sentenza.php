<?php

namespace giustiziapredittiva;

use Illuminate\Database\Eloquent\Model;
use giustiziapredittiva\Predizione;
use giustiziapredittiva\Keyword;

class Sentenza extends Model
{
    protected $table = 'Sentenza';
    
    protected $fillable = ['corte', 'numero_data', 'giudice', 'caso', 
        'massima', 'decisione', 'provvedimento'];
    
    public function predizioni() {
        // use the 'predizioni' property: $sentenza->predizioni (returns an array)
        return $this->hasMany(Predizione::class,'id_sentenza');
    }
    
    public function keywords() {
        // use the 'keywords' property: $sentenza->keywords (returns an array)
        return $this->belongsToMany(Keyword::class, 'Keyword_Sentenza');
    }
}
