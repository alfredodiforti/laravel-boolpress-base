@extends('layouts.ossatura')
@section('content')
<div>
    <h1 class="text-center">DETAIL PETS</h1>
    <a href="{{route('pets.edit', $pet->slug)}}" class="btn">edit</a>
    <article>
        <h2 class="text-center">{{$pet->nome}}</h2>
        <h3 class="text-center">{{$pet->razza}}</h3>
        <p class="text-center">{{$pet->dettagli}}</p>
        <h5 class="text-center">{{$pet->created_at->format('d/m/Y ')}}</h5>
    </article> 
</div>
<div class="container">
    @if(!empty($pet->img)) 
        <img class="img-fluid" src="{{ asset('storage/'. $pet->img)}}" alt="{{$pet->nome}}">
            
        @else 
            <p>no image for this pet</p>
            
    @endif
</div>
    
@endsection