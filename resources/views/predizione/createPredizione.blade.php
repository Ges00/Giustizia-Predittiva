@extends('layouts.master_protected')


@section('corpo')
<div class="row">
    <div class='col-md-12'>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form class="form-horizontal" name="predizione" method="POST" action="{{ route('predizione.store', ['id_padre' => $id_padre])}}">
            {{ csrf_field() }}
            <div class="form-group">
                <!--<label for="se_allora" class="col-md-2 tribleft">Se Allora</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="se_allora" name="se_allora" placeholder="se, allora">
                </div>-->
                <label for="se_allora" class="col-md-2 tribleft">Se Allora</label>
                <div class="col-sm-10">
                    <textarea id="editor" name="se_allora" type="text"></textarea>
                </div>
                <label for="id_sentenza" class="col-md-2 tribleft">Choose a sentenza:</label>
                <div class="col-sm-10">
                    <select id="id_sentenza" name="id_sentenza">
                        @foreach($sentenze as $s)
                        <option value="{{$s->id}}">{{$s->numero_data}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="mySubmit" type="submit" value="Create" class="hidden btn btn-light"/>
                    <a href="{{ route('categoryChildren', ['id_padre' => $id_padre]) }}" class="btn btn-danger">Cancel</a>                         
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

