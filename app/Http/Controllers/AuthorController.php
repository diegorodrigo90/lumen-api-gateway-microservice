<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the authors microservice;
     *
     * @var AuthorService
     */
    public $authorService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    /**
     * Return a list of authors.
     *
     * @return Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Create a new author.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function show($authorId)
    {
    }

    /**
     * Update details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
    }

    /**
     * Delete one author.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($authorId)
    {
    }
}
