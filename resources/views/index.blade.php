@extends('layouts.master_protected')

@section('loginlogout')
@if($logged)
<ul class="navbar-nav log-in-nav">
    <li class="nav-item" >
        <a class="btn btn-light btn-margin-left btn-margin-right" href="{{ route('user.logout') }}"> Log out <span class="glyphicon glyphicon-log-out"></span></a>
    </li>
    <li class="nav-item" >
        <a class="btn btn-light btn-margin-left btn-margin-right" href="{{ route('sentenza.create') }}"> Nuova Sentenza<span class="glyphicon glyphicon-log-out"></span></a>
    </li>
</ul>
@else
<ul class="navbar-nav log-in-nav">
    <li class="nav-item">
        <a class="btn btn-light" href="{{ route('user.login') }}">Log in<span class="glyphicon glyphicon-user"></span></a>
    </li>
</ul>
@endif
@endsection


@section('corpo')
<h1 class="tit_home">Sistema di giustizia predittiva del Tribunale di Brescia</h1>
<div class="row">
    <div class="col-md-6">
        <div class="box">
            <h2><a href="{{ route('categoryChildren',[$lavoro->id]) }}">Diritto del lavoro</a></h2>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <h2><a href="{{ route('categoryChildren',[$imprese->id]) }}">Diritto delle imprese</a></h2>
        </div>
    </div>
</div>
@endsection