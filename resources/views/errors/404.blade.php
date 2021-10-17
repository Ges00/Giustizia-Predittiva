@extends('layouts.master_protected')

@section('corpo')
<h1 class="tit_int">Errore di accesso - Pagina non trovata</h1>
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="box box2">
            <h3>Pagina non trovata</h3>
            <p>La pagina che stai tentando di visualizzare non esiste</p>
            <p><a class="btn btn-default" href="{{ route('home') }}"> Torna nella Home Page</a></p>
        </div>
    </div>
    
</div>
@endsection