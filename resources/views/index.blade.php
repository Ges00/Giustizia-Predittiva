@extends('layouts.master_protected')

@section('loginlogout')
    @if($logged)
    <ul class="navbar-nav" >
      <li class="nav-item" >
          <a class="nav-link btn btn-light" href="{{ route('user.logout') }}"> Log out <span class="glyphicon glyphicon-log-out"></span></a>
      </li>
      <li class="nav-item" >
          <a class="nav-link btn btn-light" href="{{ route('sentenza.create') }}"> Nuova Sentenza<span class="glyphicon glyphicon-log-out"></span></a>
      </li>
    </ul>
    @else
    <ul class="navbar-nav btn btn-light">
        <li class="nav-itm"><a class="nav-link" href="{{ route('user.login') }}"><span class="glyphicon glyphicon-user"></span> Log in</a></li>
    </ul>
    @endif
@endsection


@section('corpo')
<p class="pollicino">Home</p>
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