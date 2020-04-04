@extends('layouts.layout')
@section('content')

@if (count($errors) > 0)
<div class="alert alert-danger">
    <strong>Error!</strong> Revise los campos obligatorios.<br><br>
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

<h3>Editar Libro</h3>
<form method="POST" action="{{ route('books.update',$book->id) }}"  role="form">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-check-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control input-sm" value="{{$book->name}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-check-label">Autor</label>
                <input type="text" name="author" id="author" class="form-control input-sm" value="{{$book->author}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-check-label">Categoría</label>
                <select id="category_id" name="category_id" class="form-control">
                    <option>------Selecciona una Categoría------</option>
                    @foreach( $categories as $key => $value )
                    <option value="{{ $key }}" {{$book->category_id == $key  ? 'selected' : ''}}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-check-label">Fecha de Publicación</label>
                <input type="text" name="published_date" id="published_date" class="form-control input-sm" value="{{$book->published_date}}">
            </div>
        </div>
    </div>
    <input type="hidden" name="user_id" id="user_id" value="{{$book->user_id}}">
    <input type="hidden" name="available" id="available" value="{{$book->available}}">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Actualizar" class="btn btn-success">
            <a href="{{ route('books.index') }}" class="btn btn-info" >Atrás</a>
        </div>	

    </div>
</form>
@endsection