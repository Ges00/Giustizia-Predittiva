@extends('layouts.master_protected')


@section('loginlogout')
    @if($logged)
        <a><i class="pollicino"> Logged in as admin: {{ $loggedName }}</i></a></li>
    @endif
@endsection

@section('corpo')
<p class="pollicino"><a href="{{ route('home') }}">Home</a>
    @foreach($breadcrumb as $item)
    > <a href="{{ route('categoryChildren',[$item->id]) }}">{{ $item->nome }}</a>
    @endforeach
</p>

<h1 class="tit_int">{{ $superCategory->nome }}
    @if($superCategory->dettagli != null)
    <svg data-toggle="modal" data-target="#confirmModal" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-info-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
        <path d="M8.93 6.588l-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588z"/>
        <circle cx="8" cy="4.5" r="1"/>
    </svg>
    @endif
</h1>
    
@if($superCategory->dettagli != null)
<div class="modal fade" id="confirmModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>{{ $superCategory->nome }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <?php echo $superCategory->dettagli ?>
            </div>
        </div>
    </div>
</div>
@endif

<div class="row">
    @if((count($categoryList)!=0)&&(count($predizioni)!=0))
    <div class="col-md-6 col-sm-6 col-6 headsx">
        <ul class="elenco">
            @foreach($categoryList as $category)
            <li><a href="{{ route('categoryChildren',[$category->id]) }}">{{ $category->nome }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-6 col-sm-6 col-6">
        @foreach($predizioni as $pred)
        <div class="box box2">
            <h3>Predizione</h3>
            <!--<p>{{ $pred->se_allora }}</p>-->
            <p><?php echo $pred->se_allora ?></p>
            <p><a class="btn btn-default" href="{{ route('sentenza.show', ['sentenza' => $pred->id_sentenza, 'cat' => $superCategory->id]) }}"><img src="{{ url('/') }}/img/img_550706.png" width="20"/> Vai al caso</a></p>
        </div>
        @endforeach 
    </div>
    @else
    <div class="col-md-12 col-sm-12 col-12">
        <ul class="elenco">
            @foreach($categoryList as $category)
            <li><a href="{{ route('categoryChildren',[$category->id]) }}">{{ $category->nome }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-md-12 col-sm-12 col-12">
        @foreach($predizioni as $pred)
        <div class="box box2">
            <h3>Predizione</h3>
            <!--<p>{{ $pred->se_allora }}</p>-->
            <p><?php echo $pred->se_allora ?></p>
            <p><a class="btn martello" href="{{ route('sentenza.show', ['sentenza' => $pred->id_sentenza, 'cat' => $superCategory->id]) }}"><img src="{{ url('/') }}/img/martello.png" width="20"/> Vai al caso</a></p>
            @if($logged)
                <p><a class="btn martello" href="{{ route('sentenza.edit', ['sentenza' => $pred->id_sentenza, 'cat' => $superCategory->id]) }}"><img src="{{ url('/') }}/img/move_sentenza.png" width="50"/>Sposta sentenza</a></p>            
            @endif
        </div>
        @endforeach
        
    </div>
    @endif

</div>
@endsection