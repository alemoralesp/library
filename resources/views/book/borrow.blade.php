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

<h3>Prestar Libro</h3>
<form method="POST" action="{{ route('book.unavailable',$book->id) }}"  role="form">
    {{ csrf_field() }}
    <input name="_method" type="hidden" value="PATCH">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-check-label">Seleccione el usuario al que le prestara el libro {{$book->name}}</label>
                <input type="hidden" name="id" id="id" value="{{$book->id}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label class="form-check-label">Usuario</label>
                <select id="user_id" name="user_id" class="form-control">
                    <option>------Selecciona un Usuario------</option>
                    @foreach( $users as $key => $value )
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <input type="submit"  value="Prestar" class="btn btn-success">
            <a href="{{ route('books.index') }}" class="btn btn-info" >Cancelar</a>
        </div>	

    </div>
</form>
@endsection