@extends('layouts.main')

@section('title', 'Time line')

@section('content')
    
    <div id="search-container" class="col-md-12">
         <h1>Publicações</h1>
         <form action="/publicacoes" method="GET" >
            <input type="text" id="search" name="search" class="form-control" placeholder="Procurar...">
         </form>  
    </div>

    <div id="posts-container" class="col-md-12">
        @if($search)
        <h2> Buscando por :{{ $search }} </h2>
        @else
        <h2> Proximas Publicações </h2>
        @endif
        <div id="cards-container" class="column">
            @foreach($publications as $publication)
            <div class="card col-md-3">
                <img src="/img/imgPublications/{{ $publication->image }}" alt="{{ $publication->title }}">
                <div class="card-body">

                    <div class="card-date"> {{$publication->user->name}} -- {{ $publication->city }} -- {{ date('d/m/Y'), strtotime($publication->created_at) }} </div>
                    <h5 class="card-title">{{ $publication->title }}</h5>
                    <p class="card-descricao">{{ $publication->description }} </p>
                    <a href="#" class="btn btn-primary">Curtir</a>
                    <input type="text" id="comentar" name="comentar" class="form-control" placeholder="comentar...">
                    
                </div>    
            </div>    
            @endforeach

            @if(count($publications) == 0 && $search)
                <h4>Não foi possível encontrar nenhuma publicação com o nome de {{ $search }} ! <a href="/publicacoes">Ver todas</a></h4>
            @elseif(count($publications) == 0)   
                <h4>Não há publicações no momento</h4> 
            @endif

        </div>   
    </div>    

    
                 
@endsection        