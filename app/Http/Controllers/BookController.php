<?php

namespace App\Http\Controllers;
use App\Services\BookService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class BookController extends Controller
{
    use ApiResponser;
    /**
     * The service to consume the books microservice;
     *
     * @var BookService
     */
    public $bookService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    /**
     * Return a list of books.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Create a new book.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function show($bookId)
    {

    }

    /**
     * Update details about one book.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $bookId)
    {

    }

    /**
     * Delete one book.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($bookId)
    {

    }
}
