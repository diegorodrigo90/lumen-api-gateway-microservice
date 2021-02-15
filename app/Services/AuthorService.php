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
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->baseUri = config('services.authors.base_uri');
    }
}
