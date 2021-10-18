<?php

namespace Media101\WeFactApi\Exceptions;

use Exception;

class ApiException extends Exception
{
    protected $code = 500;
    public array $response;

    public function __construct(array $apiResponse)
    {
        parent::__construct();
        $this->message = implode(',', $apiResponse['errors'] ?? []);
        $this->response = $apiResponse;
    }
}