<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function addBook(Request $request){
        $this->validate($request, [
            'name' => 'required|min:6|max:100',
            'publisher_id' => 'required'
        ]);

        $book = Book::create($request->all());

        return $book;
    }

    public function getBooks(){
        $books = Book::with(['publisher','authors'])->withCount(['authors'])->get();

        return $books;
    }

    public function getBook($id){
        $book = Book::findOrFail($id);

        return $book;
    }

    public function updateBook($id, Request $request){
        $book = Book::findOrFail($id);

        $book->name = $request->input('name');

        $book->save();

        return [
            "message" => "Book Updated"
        ];
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return [
            "message" => "Book was deleted."
        ];
    }

    public function attachAuthor($id, $author_id){
        $book = Book::findOrFail($id);

        $book->authors()->syncWithoutDetaching([$author_id]);

        return [
            "message" => "Author was attached."
        ];
    }

    public function detachAuthor($id, $author_id){
        $book = Book::findOrFail($id);

        $book->authors()->detach($author_id);

        return [
            "message" => "Author was detached."
        ];
    }
}
