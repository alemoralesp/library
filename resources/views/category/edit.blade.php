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

<h3>Editar Categoría</h3>
<form method="POST" action="{{ route('categories.update',$category->id) }}"  role="form">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6">
            <div class="form-group">
                <label class="form-check-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control input-sm" value="{{$category->name}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-check-label">Descripción</label>
                <input type="text-area" name="description" id="description" class="form-control" value="{{$category->description}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Actualizar" class="btn btn-success">
            <a href="{{ route('categories.index') }}" class="btn btn-info" >Atrás</a>
        </div>	

    </div>
</form>
@endsection