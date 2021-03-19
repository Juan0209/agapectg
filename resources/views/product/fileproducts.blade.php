@extends('layouts.guest')
@section('content')

<div class="container">
 <div class="row">
     <div class="col">
         <h1>Subir imagenes </h1>
         <form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
             @csrf
             <div class="form-group">
             <input type="file" name="file" id="file" accept="image/*">

@error('file')
<small class="text-danger">{{$message}}</small>
@enderror
             </div>
<button type="submit">   Subir imagen </button>
         </form>
 </div>


</div>


@endsection