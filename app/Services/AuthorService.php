<?php

namespace App\Services;

use App\Traits\ConsumeExternalService;

class AuthorService
{
    use ConsumeExternalService;

    /**
     * The base uri to consume the authors service
     *
     * @var string
     */
    public $baseUri;

    /**
     * The secret to consume the authors service
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
        $this->baseUri = config('app.authors.base_uri');
        $this->secret = config('app.authors.secret');
    }

    /**
     * Obtain the full list of author from the author service
     *
     * @return string
     */
    public function obtainAuthors()
    {
        return $this->performRequest('GET', 'authors');
    }

     /**
     * Obtain specific author from the author service
     *
     * @return string
     */
    public function obtainAuthor($authorId)
    {
        return $this->performRequest('GET', "authors/{$authorId}");
    }


    /**
     * Create a new author from the author service
     *
     * @return string
     */

    public function createAuthor($data)
    {
        return $this->performRequest('POST', 'authors', $data);
    }

    /**
     * Update an author from the author service
     *
     * @return string
     */

    public function editAuthor($data, $authorId)
    {
        return $this->performRequest('PUT', "authors/{$authorId}", $data);
    }

    /**
     * Delete an author from the author service
     *
     * @return string
     */

    public function deleteAuthor($authorId)
    {
        return $this->performRequest('DELETE', "authors/{$authorId}");
    }
}
