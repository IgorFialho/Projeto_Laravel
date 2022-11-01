@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Publicações</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-publications-container">
    @if(count($publications) > 0)
    <table class="table">
        <thead>
            <tr>
               <th scope="col">Id</th>
               <th scope="col">Titulo</th>
               <th scope="col">Cidade</th>
               <th scope="col">Descrição</th> 
               <th scope="col">Ações</th> 

            </tr>
       </thead>  
       <tbody>
           @foreach($publications as $publication)
           <tr>
               <th scropt="row">{{ $publication->id}}</th>
               <td><a href="/dashboard/{{$publication->id}}">{{$publication->title}}</a></td>
               <td><a href="/dashboard/{{$publication->id}}">{{$publication->city}}</a></td>
               <td><a href="/dashboard/{{$publication->id}}">{{$publication->description}}</td>
               <td><a href="#" class="btn btn-primary"><ion-icon name="create-outline"></ion-icon>Editar</a> 
               <form action="/dashboard/{{$publication->id}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger delete-btn"><ion-icon name="trash outline"></ion-icon>Deletar</button>
               </form>
               </td> 

            </tr>
           @endforeach  
       </tbody> 
    </table>

    @else
     <p>Você ainda não possui nenhuma publicação ! <a href="/publicar">(click para realizar uma)</a></p>
    @endif 
</div>   

@endsection
