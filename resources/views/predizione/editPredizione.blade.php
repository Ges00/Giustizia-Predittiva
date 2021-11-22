@extends('layouts.master_protected')

@section('corpo')
<div class="row">
    <div class='col-md-12'>
        <form class="form-horizontal" name="predizioneUpdate" method="GET" action="{{ route('predizione.update', ['id' => $id, 'id_padre' => $id_padre])}}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="se_allora" class="col-md-2 tribleft">Se Allora</label>
                <div class="col-sm-10">
                    <textarea id="editor" name="se_allora" type="text" placeholder="se_allora">{{$pred_to_edit->se_allora}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="mySubmit" type="submit" value="Edit" class="hidden btn btn-light"/>
                    <a href="{{ route('categoryChildren', ['id_padre' => $id_padre]) }}" class="btn btn-danger">Cancel</a>                         
                </div>
            </div>
        </form>
    </div>
</div>
@endsection