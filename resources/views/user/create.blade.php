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

<h3>Nuevo Usuario</h3>
<br/>
<div class="table-container">
    <form method="POST" action="{{ route('users.store') }}"  role="form">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" id="name" name="name" placeholder="Nombre de Usuario" required="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" required="">
                </div>
            </div>
        </div>

        <input type="submit"  value="Guardar" class="btn btn-success">
        <a href="{{ route('users.index') }}" class="btn btn-info" >Atrás</a>
    </form>
</div>
@endsection