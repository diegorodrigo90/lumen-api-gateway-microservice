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
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.books.base_uri');
    }
}
