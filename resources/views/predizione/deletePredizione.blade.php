@extends('layouts.master_protected')


@section('corpo')
<div class="container text-center">
    <div class="row">
        <div class="col-md-12">
            <header>
                <h1>
                    Delete predizione "{{ $id_pred }}":
                </h1>
            </header>
            <p class='lead'>
                Deleting predizione. Confirm?
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
                    <p>The predizione <strong>will not be removed</strong> from the data base</p>
                    <p><a class="btn btn-light" href="{{ route('home') }}"><span class='glyphicon glyphicon-log-out'></span> Back to home</a></p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class='panel-heading'>
                    Confirm
                </div>
                <div class='panel-body'>
                    <p>The predizione <strong>will be permanently removed</strong> from the data base</p>
                    <p><a class="btn btn-danger" href="{{ route('predizione.destroy', ['id' => $id_pred]) }}"><span class='glyphicon glyphicon-trash'></span> Delete</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection