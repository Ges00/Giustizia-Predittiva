<?php

namespace giustiziapredittiva;

use Illuminate\Database\Eloquent\Model;
use giustiziapredittiva\Sentenza;

class Keyword extends Model
{
    protected $table = 'Keyword';
    
    protected $fillable = ['nome','nome_codificato'];
    
    public function sentenze() {
        // use the 'sentenze' property: $keyword->sentenze (returns an array)
        return $this->belongsToMany(Sentenza::class, 'Keyword_Sentenza');
    }
}
