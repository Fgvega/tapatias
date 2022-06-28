@extends('layouts.app')


@section('content')

<br>
<div class="container">

<form action="{{ route('store_publication') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field() }}
  <div class="form-group">
    <label for="Titulo">Titulo:</label>
    <input type="text" class="form-control" id="title" name="title" maxlength="150" aria-describedby="emailHelp">
    <small id="title" class="form-text text-muted"> El titulo debe contener maximo 150 caracteres.</small> 
  </div>
<div class="form-group">
	<label for="description">Descripcion:</label>
	<textarea class="form-control" id="description" rows="5" maxlength="600"></textarea>
	<small id="description" class="form-text text-muted"> La descripcion debe contener maximo 600 caracteres.</small>
</div>
<div class="form-group">
	<small id="imageDescription" class"form-text text-muted"> El maximo numero de imagenes cargadas es de 5, la primer imagen sera la que se muestre como caratula al inicio.</small>
	<br>
	<label for="image1">Imagen 1:</label>
	<input type="file" class="form-control-file" id="img1" name="img1">
</div>
<div class="form-group">
	<label for="image2">Imagen 2:</label>
	<input type="file" class="form-control-file" id="img2" name="img2">
</div>
<div class="form-group">
	<label for="image3">Imagen 3:</label>
	<input type="file" class="form-control-file" id="img3" name="img3">
</div>
<div class="form-group">
	<label for="image4">Imagen 4:</label>
	<input type="file" class="form-control-file" id="img4" name="img4">
</div>
<div class="form-group">
	<label for="image5">Imagen 5:</label>
	<input type="file" class="form-control-file" id="img5" name="img5">
</div>
<hr>
  <button type="submit" class="btn btn-primary">Publicar</button>
</form>

</div>

@endsection
