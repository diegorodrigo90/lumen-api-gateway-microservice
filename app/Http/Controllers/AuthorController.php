<?php

namespace App\Http\Controllers;

use App\Services\AuthorService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
        return $this->successResponse($this->authorService->obtainAuthors());
    }

    /**
     * Create a new author.
     *
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->successResponse($this->authorService->createAuthor($request->all(), Response::HTTP_CREATED));
    }

    /**
     * Display details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function show($authorId)
    {
        return $this->successResponse($this->authorService->obtainAuthor($authorId));

    }

    /**
     * Update details about one author.
     *
     * @return illuminate\Http\Response
     */
    public function update(Request $request, $authorId)
    {
        return $this->successResponse($this->authorService->editAuthor($request->all(), $authorId));

    }

    /**
     * Delete one author.
     *
     * @return illuminate\Http\Response
     */
    public function destroy($authorId)
    {
        return $this->successResponse($this->authorService->deleteAuthor($authorId));

    }
}
