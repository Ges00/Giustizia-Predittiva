@extends('layouts.master_protected')

@section('corpo')
<p class="pollicino"><a href="{{ route('home') }}">Home</a> > Diritto delle imprese</p>
<h1 class="tit_int">Diritto delle imprese</h1>
<div class="row">
    @foreach($categoryList as $category)
        <div class="col-md-6">
            <div class="box">
                <h3><a href="{{ route('categoryChildren',[$category->id]) }}">{{ $category->nome }}</a></h2>
            </div>
        </div>
    @endforeach
</div>
@endsection