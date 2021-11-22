@extends('layouts.master_protected')

@section('corpo')
<div class="row">
    <div class='col-md-12'>
        <form class="form-horizontal" name="sentenzaUpdate" method="GET" action="{{ route('sentenza.update', ['id' => $id, 'id_padre' => $id_padre])}}">
            {{ csrf_field() }}
            <div class="form-group">
                <!--<label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname" value="John"><br>
                <label for="lname">Last name:</label><br>
                <input type="text" id="lname" name="lname" value="Doe"><br><br>
                <input type="submit" value="Submit">-->
                <label for="corte" class="col-md-2 tribleft">Corte</label>
                <div class="col-sm-10">
                    <select id="corte" name="corte">
                        <option value="Corte di Appello di Brescia">Corte di Appello di Brescia</option>
                        <option value="Tribunale di Brescia">Tribunale di Brescia</option>
                    </select>
                </div>
                <label for="num_data" class="col-md-2 tribleft">Numero e data</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="numero_data" name="numero_data" placeholder="{{$sent_to_edit->numero_data}}">
                </div>
                <label for="giudice" class="col-md-2 tribleft">Giudice</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="giudice" name="giudice" placeholder="{{$sent_to_edit->giudice}}">
                </div>
                <label for="caso" class="col-md-2 tribleft">Caso</label>
                <div class="col-sm-10">
<!--                    <input class="form-control" type="text" id="caso" name="caso" placeholder="caso">-->
                    <textarea id="editor" name="caso" type="text" placeholder="">{{$sent_to_edit->caso}}</textarea>
                </div>
                <label for="massima" class="col-md-2 tribleft">Massima</label>
                <div class="col-sm-10">
<!--                    <input class="form-control" type="text" id="massima" name="massima" placeholder="massima">-->
                    <textarea id="editor" name="massima" type="text" placeholder="">{{$sent_to_edit->massima}}</textarea>
                </div>
                <label for="decisione" class="col-md-2 tribleft">Decisione</label>
                <div class="col-sm-10">
<!--                    <input class="form-control" type="text" id="decisione" name="decisione" placeholder="decisione">-->
                    <textarea id="editor" name="decisione" type="text" placeholder="">{{$sent_to_edit->decisione}}</textarea>
                </div>
                <label for="provvedimento" class="col-md-2 tribleft">Provvedimento</label>
                <div class="col-sm-10">
<!--                    <input class="form-control" type="text" id="provvedimento" name="provvedimento" placeholder="provvedimento">-->
                    <textarea id="editor" name="provvedimento" type="text" placeholder="">{{$sent_to_edit->provvedimento}}</textarea>
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