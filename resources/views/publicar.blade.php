@extends('layouts.main')

@section('title', 'Publicar')

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3"> 
    <h1> Faça sua postagem </h1>
    <form action="/publicar" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
         <label for="image">Enviar Foto ou video:</label>
         <input type="file" class="form-control-file" id="image" name="image">
      </div>

      <div class="form-group">
         <label for="title">Título:</label>
         <input type="text" class="form-control" id="title" name="title" placeholder="Título...">
      </div>

      <div class="form-group">
         <label for="title">Cidade:</label>
         <input type="text" class="form-control" id="city" name="city" placeholder="Cidade...">
      </div>

      <div class="form-group">
         <label for="title">Publico ou Privado ?</label>
         <select name="private" id="private" class="form-control">
            <option value="1">Púplico</option>
            <option value="0">Privado</option>
         </select>
      </div>

      <div class="form-group">
         <label for="title">Legenda:</label>
         <textarea name="description" id="description" rows="6"  class="form-control"  placeholder="Escreva uma leganda..."></textarea>
      </div>
    
      <input type="submit" class="btn btn-primary" value="Salvar">
    </form>    
</div>
           

@endsection        


