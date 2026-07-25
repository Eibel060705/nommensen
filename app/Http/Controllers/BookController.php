<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Footer;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        $footer = Footer::query()->first();

        return view('perpustakaan', compact(
            'books',
            'footer'
        ));
    }
}