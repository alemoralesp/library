<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Validation\Validator;
    
use App\Book;
use App\Category;
use App\User;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('name', 'ASC')->paginate(5);
        return view('book.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function borrow($id){
        $book = Book::find($id);
        $users=User::pluck('name','id');
        return view('book.borrow', ['book' => $book, 'users' => $users]);
    }
    
    public function unavailable(Request $request) {
        $id = $request->id;
        $book = Book::find($id);

        if ($book->available == 1) {
            $book->available = 0;
            $book->user_id = $request->user_id;
        } else {
            $book->available = 1;
            $book->user_id = null;
        }
        $book->save();

        return redirect()->route('books.index')->with('success', 'Estatus actualizado satisfactoriamente');
    }
    
    public function available($id) {
        $book = Book::find($id);

        if ($book->available == 0) {
            $book->available = 1;
            $book->user_id = null;
        }
        $book->save();

        return redirect()->route('books.index')->with('success', 'Estatus actualizado satisfactoriamente');
    }
    
    public function create()
    {
        $categories=Category::pluck('name','id');
        return view('book.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'author'=>'required|regex:/^[a-zA-Z ]+$/',
            'category_id'=>'required',
            'published_date'=>'required|date_format:d/m/Y'
        ]);
        
        $book = new Book([
            'name' => $request->get('name'),
            'author' => $request->get('author'),
            'category_id' => $request->get('category_id'),
            'published_date' => $request->get('published_date'),
            'user_id' => null,
            'available' => true
        ]);
        
        $book->save();
        //Book::create($request->all());
        return redirect()->route('books.index')->with('success', 'Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        return view('book.show', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::pluck('name','id');
        $book = Book::find($id);
        return view('book.edit', compact('book'), ['categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|regex:/^[a-zA-Z ]+$/',
            'author'=>'required|regex:/^[a-zA-Z ]+$/',
            'category_id'=>'required',
            'published_date'=>'required|date_format:d/m/Y'
        ]);
        
        $book = Book::find($id);
        $book->name =  $request->get('name');
        $book->author =  $request->get('author');
        $book->category_id =  $request->get('category_id');
        $book->published_date =  $request->get('published_date');
        $book->user_id =  $request->get('user_id');
        $book->available =  $request->get('available');
        $book->save();
        
        return redirect()->route('books.index')->with('success', 'Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::find($id)->delete();
        return redirect()->route('books.index')->with('success', 'Registro eliminado satisfactoriamente');
    }
}
