@extends('layouts.ossatura')
@section('content')
<div>
    <h1> edit {{ $pet->nome}}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
        
    @endif

    <form action="{{route('pets.update', $pet->id)}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('PATCH')
     <label for="nome">nome</label>
     <input type="text" name="nome" id="nome" value="{{old('nome', $pet->nome)}}">
     <label for="razza">razza</label>
     <input type="text" name="razza" id="razza" value="{{old('razza', $pet->razza)}}">
     <label for="dettagli">dettagli</label>
     <textarea type="text" name="dettagli" id="dettagli">{{old('dettagli', $pet->dettagli)}}</textarea>
     <label for="pedigree">pedigree</label>
     <select name="pedigree" id="pedigree">pedigree
     <option value="1">SI</option>
     <option value="0">NO</option>
    </select>
    <div> 
        <label for="img">img</label>
        @isset($pet->img)
        <div class="wrap-image">
            <img width="200px" src="{{asset('storage/' . $pet->img)}}" alt="$pet->nome">
        </div>
        <h6>change</h6>
            
        @endisset
        <input type="file" name="img" id="img" accept="image/*">
    </div>
    <div>
        <input type="UPDATE" value="update pets">
    </div>





    </form>



</div>
    
@endsection