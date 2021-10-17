@extends('layouts.master_protected')

@section('corpo')
<div class="row">
    <div class='col-md-12'>
        <form class="form-horizontal" name="categoria" method="get" action="{{ route('sentenza.create')}}">
            @csrf
            <div class="form-group">
                <label for="corte" class="col-md-2">Corte</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="corte" name="corte" placeholder="corte">
                </div>
                <label for="num_data" class="col-md-2">Numero e data</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="num_data" name="num_data" placeholder="num_data">
                </div>
                <label for="giudice" class="col-md-2">Giudice</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="giudice" name="giudice" placeholder="giudice">
                </div>
                <label for="caso" class="col-md-2">Caso</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="caso" name="caso" placeholder="caso">
                </div>
                <label for="massima" class="col-md-2">Massima</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="massima" name="massima" placeholder="massima">
                </div>
                <label for="decisione" class="col-md-2">Decisione</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="decisione" name="decisione" placeholder="decisione">
                </div>
                <label for="provvedimento" class="col-md-2">Provvedimento</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="provvedimento" name="provvedimento" placeholder="provvedimento">
                </div>
            </div>
            <div class='form-group'>
                <div class="col-sm-10 col-sm-offset-2">
                    <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Create</label>
                    <input id="mySubmit" type="submit" value="Create" class="hidden"/>
                </div>
            </div>
    </div>
</div>