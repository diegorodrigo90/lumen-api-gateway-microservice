<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class BookService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume the books service
     *
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the books service
     *
     * @var string
     */
    public $secret;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('app.books.base_uri');
        $this->secret = config('app.books.secret');

    }

    /**
     * Obtain the full list of author from the author service
     *
     * @return string
     */
    public function obtainBooks()
    {
        return $this->performRequest('GET', 'books');
    }

     /**
     * Obtain specific author from the author service
     *
     * @return string
     */
    public function obtainBook($bookId)
    {
        return $this->performRequest('GET', "books/{$bookId}");
    }


    /**
     * Create a new author from the author service
     *
     * @return string
     */

    public function createBook($data)
    {
        return $this->performRequest('POST', 'books', $data);
    }

    /**
     * Update an author from the author service
     *
     * @return string
     */

    public function editBook($data, $bookId)
    {
        return $this->performRequest('PUT', "books/{$bookId}", $data);
    }

    /**
     * Delete an author from the author service
     *
     * @return string
     */

    public function deleteBook($bookId)
    {
        return $this->performRequest('DELETE', "books/{$bookId}");
    }
}
