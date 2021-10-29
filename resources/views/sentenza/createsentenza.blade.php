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
        <form class="form-horizontal" name="sentenza" method="POST" action="{{ route('sentenza.store')}}">
            {{ csrf_field() }}
            <div class="form-group">
                <!--<label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname" value="John"><br>
                <label for="lname">Last name:</label><br>
                <input type="text" id="lname" name="lname" value="Doe"><br><br>
                <input type="submit" value="Submit">-->

<!-- CODICE PER WYSIWYG <textarea id="summernote" name="editordata"></textarea> -->
                <label for="corte" class="col-md-2 tribleft">Corte</label>
                <select id="corte" name="corte">
                    <option value="Corte di Appello di Brescia">Corte di Appello di Brescia</option>
                    <option value="Tribunale di Brescia">Tribunale di Brescia</option>
                </select>
                <label for="num_data" class="col-md-2 tribleft">Numero e data</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="numero_data" name="numero_data" placeholder="numero e data">
                </div>
                <label for="giudice" class="col-md-2 tribleft">Giudice</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="giudice" name="giudice" placeholder="giudice">
                </div>
                <label for="caso" class="col-md-2 tribleft">Caso</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="caso" name="caso" placeholder="caso">
                </div>
                <label for="massima" class="col-md-2 tribleft">Massima</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="massima" name="massima" placeholder="massima">
                </div>
                <label for="decisione" class="col-md-2 tribleft">Decisione</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="decisione" name="decisione" placeholder="decisione">
                </div>
                <label for="provvedimento" class="col-md-2 tribleft">Provvedimento</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="provvedimento" name="provvedimento" placeholder="provvedimento">
                </div>
                <label for="mySubmit" class="btn btn-primary btn-large btn-block"><span class="glyphicon glyphicon-floppy-save"></span> Create</label>
                <input id="mySubmit" type="submit" class="hidden"/>
                <!-- CODICE PER WYSIWYG <script>
                    $(document).ready(function () {
                        $('#summernote').summernote();
                    });
                </script> -->
            </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <a href="{{ route('home') }}" class="btn btn-danger btn-large btn-block"><span class="glyphicon glyphicon-log-out"></span> Cancel</a>                         
                </div>
            </div>  
        </form>
    </div>
</div>
@endsection