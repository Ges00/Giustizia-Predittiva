@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete sentenza "{{ $numero_data }}" and the associated predictions:
                </h1>
                @foreach($predizioni as $pred)
                <p>"{{$pred->id}}"</p>
                @endforeach
            </header>
            <p class='lead'>
                Deleting sentenza. Confirm?
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
                    <p>The sentenza <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-light" href="{{ route('home') }}"><span class='glyphicon glyphicon-log-out'></span> Back to sentenza</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The sentenza and all the associated predictions <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('sentenza.destroy', ['id' => $id_sentenza]) }}"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection