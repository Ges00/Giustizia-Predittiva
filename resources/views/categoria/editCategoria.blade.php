@extends('layouts.master_protected')

@section('corpo')
<div class="row">
    <div class='col-md-12'>       
        <form class="form-horizontal" name="categoriaUpdate" method="GET" action="{{ route('categoria.update', ['id' => $cat_to_edit->id])}}">
            {{ csrf_field() }}
            <label for="nome" class="col-md-2 tribleft">Nome</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" id="nome" name="nome" placeholder="{{$cat_to_edit->nome}}">
                </div>
                <label for="dettagli" class="col-md-2 tribleft">Dettagli</label>
                <div class="col-sm-10">
                    <textarea id="editor" name="dettagli" type="text" placeholder="{{$cat_to_edit->dettagli}}"></textarea>
                </div>
            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <input id="mySubmit" type="submit" value="Edit" class="hidden btn btn-light"/>
                    <a href="{{ route('categoryChildren', ['id_padre' => $cat_to_edit->id]) }}" class="btn btn-danger">Cancel</a>                         
                </div>
            </div>
        </form>
    </div>
</div>

@endsection


<?php

//showTreeRecursive($root);

function showTreeRecursive($node) {
    echo "<ul>";
    $childrens = $node->getChildren();
    foreach ($childrens as $child) {
        echo "<li class='confirm-delete'>" . $child->getValue() . "</li>";
        showTreeRecursive($child);
    }
    echo "</ul>";
}
?>

