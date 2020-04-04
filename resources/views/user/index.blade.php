@extends('layouts.layout')
@section('content')

<h4>Lista de Usuarios</h4>
<hr>
<div class="btn-group">
    <a href="{{ route('users.create') }}" class="btn btn-info" >Nuevo Usuario</a>
</div>
<br/>
<br/>

<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
        <th>Nombre</th>
        <th>Correo Electrónico</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            @if($users->count())  
            @foreach($users as $user)  
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td><a class="btn btn-primary" href="{{action('UserController@edit', $user->id)}}" >Editar</a>
                    <a class="btn btn-primary" href="{{action('UserController@show', $user->id)}}" >Detalles</a>
                    <br/>
                    <form action="{{action('UserController@destroy', $user->id)}}" method="post">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="DELETE">
                        <button onclick="return confirm('¿Seguro de eliminar este registro?');" class="btn btn-danger" type="submit">Eliminar</button>
                </td>
            </tr>
            @endforeach 
            @else
            <tr>
                <td colspan="3">No hay registros!!</td>
            </tr>
            @endif
        </tbody>

    </table>
</div>
{{ $users->links() }}
@endsection