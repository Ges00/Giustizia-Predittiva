@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1 class="confirm-delete">
                    Delete sentenza "{{ $numero_data }}" and the associated predictions:
                </h1>
                @foreach($predizioni as $pred)
                <p class="confirm-delete">"{{$pred->id}}"</p>
                @endforeach
            </header>
            <p class='lead confirm-delete'>
                Deleting sentenza. Confirm?
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading confirm-delete'>
                    Revert
                </div>
                <div class='panel-body'>
                    <p class="confirm-delete">The sentenza <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-light" href="{{ route('categoryChildren',['id_cat'=>$id_padre]) }}"><span class='glyphicon glyphicon-log-out'></span> Torna a Categoria</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading confirm-delete'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p class="confirm-delete">The sentenza and all the associated predictions <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('sentenza.destroy', ['id' => $id_sentenza, 'id_cat' => $id_padre]) }}"><span class='glyphicon glyphicon-trash'></span> Elimina </a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection