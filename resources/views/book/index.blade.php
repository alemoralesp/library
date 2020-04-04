@extends('layouts.layout')
@section('content')

<h4>Lista de Libros</h4>
<hr>
<div class="btn-group">
    <a href="{{ route('books.create') }}" class="btn btn-info" >Nuevo Libro</a>
</div>
<br/>
<br/>

<div class="table-responsive">
    <table class="table">
        <thead class="thead-dark">
        <th>Nombre</th>
        <th>Categoría</th>
        <th>Disponible</th>
        <th>Acciones</th>
        </thead>
        <tbody>
            @if($books->count())  
            @foreach($books as $book)  
            <tr>
                <td>{{$book->name}}</td>
                <td>{{$book->category->name}}</td>
                <td>{{$book->available ? 'Disponible' : 'No esta disponible'}}</td>
                <td><a class="btn btn-primary" href="{{action('BookController@edit', $book->id)}}" >Editar</a>
                    <a class="btn btn-primary" href="{{action('BookController@show', $book->id)}}" >Detalles</a>
                    @if($book->available)
                    <a class="btn btn-info" href="{{action('BookController@borrow', $book->id)}}" >Solicitar</a>
                    @else
                    <a class="btn btn-success" href="{{action('BookController@available', $book->id)}}" >Regreso</a>
                    @endif
                    <form action="{{action('BookController@destroy', $book->id)}}" method="post">
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
{{ $books->links() }}
@endsection