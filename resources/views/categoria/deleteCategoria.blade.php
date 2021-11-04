@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1 class="confirm-delete">
                    Delete category "{{ $nome }}" and its subcategories:
                </h1>
                @if(count($categorie_figlie)!=0)
                @foreach($categorie_figlie as $cat)
                <p class="confirm-delete">"{{$cat->nome}}"</p>
                @endforeach
                @else
                <p class="confirm-delete">Nessuna sottocategoria presente</p>
                @endif
            </header>
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
                    <p class="confirm-delete">The categoria <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-light" href="{{ route('categoryChildren', $id_categoria) }}"><span class='glyphicon glyphicon-log-out'></span> Torna a Categoria</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading confirm-delete'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p class="confirm-delete">The categoria and all the associated predictions and subcategories <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('categoria.destroy', ['id' => $id_categoria]) }}"><span class='glyphicon glyphicon-trash'></span> Cancella</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    @if(count($predizioni)!=0)
    <div class="col-md-12 col-sm-6 col-6">
        @foreach($predizioni as $pred)
        <div class="box box2">
            <h3>Predizione {{$pred->id}}</h3>
            <!--<p>{{ $pred->se_allora }}</p>-->
            <p><?php echo $pred->se_allora ?></p>
        </div>
        @endforeach 
    </div>
    @endif
</div>
@endsection
