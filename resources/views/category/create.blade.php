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

<h3>Nueva Categoría</h3>
<br/>
<div class="table-container">
    <form method="POST" action="{{ route('categories.store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="name" name="name" placeholder="Categoría del libro" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input class="form-control" id="description" name="description" placeholder="Descripción" required="">
                </div>
            </div>
        </div>

        <input type="submit"  value="Guardar" class="btn btn-success">
        <a href="{{ route('categories.index') }}" class="btn btn-info" >Atrás</a>
    </form>
</div>
@endsection