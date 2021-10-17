<?php

namespace giustiziapredittiva;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'Categoria';
    
    protected $fillable = ['nome', 'dettagli', 'id_categoria_padre'];
    
    public function predizioni() {
        // use the 'predizioni' property: $categoria->predizioni (returns an array)
        return $this->hasMany(Predizione::class,'id_categoria');
    }
}
