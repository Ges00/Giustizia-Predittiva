@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1 class="confirm-delete">
                    Delete sentenza "{{ $numero_data }}" and the associated predictions
                </h1>
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

<div class="row">
    <div class="col-md-12">
        <h1 class="confirm-delete text-center" style="margin-bottom: 100px; margin-top:100px">
            Predizioni associate alla sentenza che verranno eliminate:
        </h1>
    </div>

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