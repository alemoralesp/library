@extends('layouts.layout')
@section('content')

<h4>Lista de Categorias</h4>
<hr>
<div class="btn-group">
    <a href="{{ route('categories.create') }}" class="btn btn-info" >Nueva Categoría</a>
</div>
<br/>
<br/>

<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
        <th>Nombre</th>
        <th>Descripción</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            @if($categories->count())  
            @foreach($categories as $category)  
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td><a class="btn btn-primary" href="{{action('CategoryController@edit', $category->id)}}" >Editar</a>
                    <a class="btn btn-primary" href="{{action('CategoryController@show', $category->id)}}" >Detalles</a>
                    <br/>
                    <form action="{{action('CategoryController@destroy', $category->id)}}" method="post">
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
{{ $categories->links() }}
@endsection