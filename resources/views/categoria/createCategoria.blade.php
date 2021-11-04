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
        <form class="form-horizontal" name="categoria" method="POST" action="{{ route('categoria.store', ['id_padre' => $id_padre])}}">

            {{ csrf_field() }}
            <div class="form-group">
                <!--<label for="fname">First name:</label><br>
                <input type="text" id="fname" name="fname" value="John"><br>
                <label for="lname">Last name:</label><br>
                <input type="text" id="lname" name="lname" value="Doe"><br><br>
                <input type="submit" value="Submit">-->
                <label for="nome" class="col-md-2 tribleft">Nome</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="nome">
                </div>
                <label for="dettagli" class="col-md-2 tribleft">Dettagli</label>
                <div class="col-sm-10">
                    <textarea id="editor" name="dettagli" type="text"></textarea>
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

