@extends('layouts.ossatura')
@section('content')
<div>
    <h1>OUR PETS</h1>
    @forelse ($pets as $pet) 
    <article>
        <h2>{{$pet->nome}}</h2>
        <h3>{{$pet->razza}}</h3>
        <h5>{{$pet->created_at->format('d/m/Y ')}}</h5>
        <a href="{{ route('pets.show', $pet->slug)}}"> see more</a>
    </article>
        
    @empty
    <p>no post found. <a href="{{route('pets.create')}}">Add</a> a new lovely pets</p>
        
    @endforelse
</div>
    
@endsection