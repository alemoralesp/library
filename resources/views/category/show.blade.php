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

<h3>Información Completa de la Categoria</h3>
<br/>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label class="font-weight-bold">Nombre </label>
            <p>{{$category->name}}</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <label class="font-weight-bold">Descripción</label>
            <p>{{$category->description}}</p>
        </div>
    </div>
</div>

<a href="{{ route('categories.index') }}" class="btn btn-info" >Atrás</a>
@endsection