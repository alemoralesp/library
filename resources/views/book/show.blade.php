@extends('layouts.layout')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Error!</strong><br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(Session::has('success'))
<div class="alert alert-info">
    {{Session::get('success')}}
</div>
@endif

<h3>Información Completa del Libro</h3>
<br/>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Nombre </label>
            <p>{{$book->name}}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Autor </label>
            <p>{{$book->author}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Categoría</label>
            <p>{{$book->category->name}}</p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Fecha de Publicación</label>
            <p>{{$book->published_date}}</p>
        </div>
    </div>
</div>

<a href="{{ route('books.index') }}" class="btn btn-info" >Atrás</a>
@endsection