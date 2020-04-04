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

<h3>Nuevo Libro</h3>
<br/>
<div class="table-container">
    <form method="POST" action="{{ route('books.store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="name" name="name" placeholder="Nombre del libro" required="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="author" name="author" placeholder="Autor del libro" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <select id="category_id" name="category_id" class="form-control">
                        <option>------Selecciona una Categoría------</option>
                        @foreach( $categories as $key => $value )
                        <option value="{{ $key }}">{{ $value }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="published_date" name="published_date" placeholder="Fecha de Publicación" required="">
                </div>
            </div>
        </div>

        <input type="submit"  value="Guardar" class="btn btn-success">
        <a href="{{ route('categories.index') }}" class="btn btn-info" >Atrás</a>
    </form>
</div>
@endsection