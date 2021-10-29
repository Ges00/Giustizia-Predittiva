@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete category "{{ $nome }}", the associated predictions and the subcategories:
                </h1>
                @foreach($categorie_figlie as $cat)
                <p>"{{$cat->nome}}"</p>
                @endforeach
            </header>
            <p class='lead'>
                Deleting categoria. Confirm?
            </p>
        </div>
    </div>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Revert
                </div>
                <div class='panel-body'>
                    <p>The categoria <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-light" href="{{ route('categoryChildren', $id_categoria) }}"><span class='glyphicon glyphicon-log-out'></span> Torna a Categoria</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The categoria and all the associated predictions and subcategories <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('categoria.destroy', ['id' => $id_categoria]) }}"><span class='glyphicon glyphicon-trash'></span> Cancella</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
