@extends('layouts.master_protected')

@section('corpo')
<h1 class="tit_int">Errore di accesso - URL non valido</h1>
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <div class="box box2">
            <h3>Errore di formulazione dell'URL</h3>
            <p>La sequenza "{{ $messaggio }}" non &egrave; valida</p>
            <p><a class="btn btn-default" href="{{ route('home') }}"> Torna nella Home Page</a></p>
        </div>
    </div>
    
</div>
@endsection