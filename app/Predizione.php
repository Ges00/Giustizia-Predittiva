<?php

namespace giustiziapredittiva;

use Illuminate\Database\Eloquent\Model;
use giustiziapredittiva\Categoria;
use giustiziapredittiva\Sentenza;

class Predizione extends Model
{
    protected $table = 'Predizione';
    
    protected $fillable = ['se_allora','id_categoria','id_sentenza'];
    
    public function categoria() {
        // use the 'categoria' property: $predizione->categoria (returns an object Categoria)
        return $this->belongsTo(Categoria::class);
    }
    
    public function sentenza() {
        // use the 'sentenza' property: $predizione->sentenza (returns an object Sentenza)
        return $this->belongsTo(Sentenza::class);
    }
}
