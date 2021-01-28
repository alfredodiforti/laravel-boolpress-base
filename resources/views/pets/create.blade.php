@extends('layouts.ossatura')
@section('content')
<div>
    <h1> ADD YOUR PETS</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
                
            @endforeach
        </ul>
        
    @endif

    <form action="{{route('pets.store')}}" method="POST" enctype="multipart/form-data">
     @csrf
     @method('POST')
     <label for="nome">nome</label>
     <input type="text" name="nome" id="nome" value="{{old('nome')}}">
     <label for="razza">razza</label>
     <input type="text" name="razza" id="razza" value="{{old('razza')}}">
     <label for="dettagli">dettagli</label>
     <textarea type="text" name="dettagli" id="dettagli">{{old('dettagli')}}</textarea>
     <label for="pedigree">pedigree</label>
     <select name="pedigree" id="pedigree">pedigree
     <option value="1">SI</option>
     <option value="0">NO</option>
    </select>
     {{-- vaccini --}}

     <div>
         <h3>Vaccini eseguiti</h3>
         @foreach ($vaccini as $vaccino)
         <input type="checkbox" name="vaccini[]" id="tag-{{$vaccino->id}}" value="{{$vaccino->id}}">
         <label for="tag-{{$vaccino->id}}">{{$vaccino->name}}</label>
         @endforeach      
     </div>
    <div> 
        <label for="img">img</label>
        <input type="file" name="img" id="img" accept="image/*">
    </div>
    <div>
        <input type="submit" value="add pets">
    </div>





    </form>



</div>
    
@endsection