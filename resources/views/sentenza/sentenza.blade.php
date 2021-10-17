@extends('layouts.master_protected')

@section('corpo')
<p class="pollicino"><a href="{{ route('home') }}">Home</a>
    @foreach($breadcrumb as $item)
    > <a href="{{ route('categoryChildren',[$item->id]) }}">{{ $item->nome }}</a>
    @endforeach
</p>
<div class="row">
    <div class="col-md-12">
        <p class="trib">{{ $sentenza->corte }}</p>
        <div class="box box2">
            @if($sentenza->caso != " ")
            <h2>Il Caso</h2>
            <p>{{ $sentenza->caso }}</p>
            @endif
            @if($sentenza->massima != " ")
            <h2>La Massima</h2>
            <p>{{ $sentenza->massima }}</p>
            @endif
            @if($sentenza->decisione != " ")
            <h2>La Decisione</h2>
            <p>{{ $sentenza->decisione }}</p>
            @endif
            @if($sentenza->provvedimento != " ")
            <h2>Il provvedimento</h2>
            <p>{{ $sentenza->provvedimento }}</p>
            @endif
            <br>
            <h5 class="tribunale">{{ $sentenza->corte }}</h5>
            <h6>{{ $sentenza->numero_data }}</h6>
            <p>{{ $sentenza->giudice }}</p>
        </div>
    </div>
</div>
@endsection