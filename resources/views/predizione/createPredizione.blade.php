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
                <label for="se_allora" class="col-md-2 tribleft">Se Allora</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="se_allora" name="se_allora" placeholder="se, allora">
                </div>
                <label for="id_sentenza" class="col-md-2 tribleft">Choose a sentenza:</label>
                <select id="id_sentenza" name="id_sentenza">
                    @foreach($sentenze as $s)
                    <option value="{{$s->id}}">{{$s->numero_data}}</option>
                    @endforeach
                </select>
                <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Create</label>
                <input id="mySubmit" type="submit" class="hidden"/>
            </div>
        </form>
    </div>
</div>
@endsection

