@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete sentenza "{{ $sentenza->numero_data }}" from the database
                </h1>
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
                    <p><a class="btn btn-default" href="{{ route('sentenza.show') }}"><span class='glyphicon glyphicon-log-out'></span> Back to sentenza</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The sentenza and all the following predictions <strong>will be permanently removed</strong> from the data base</p>
                    @foreach($predizioni as $pred)
                    <a>
                        id: $pred->id
                    </a>
                    <p><a class="btn btn-danger" href="{{ route('sentenza.destroy', ['id' => $sentenza->id, 'predizioni' => $predizioni] ) }}"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection