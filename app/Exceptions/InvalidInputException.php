<?php

namespace App\Exceptions;

class InvalidInputException extends \Exception
{
    private $errorCode = 401;
    private $errorMessage = "INVALID INPUT";

    public function __construct()
    {
        parent::__construct($this->errorMessage, 0);
    }

    public function getErrorCode(): int
    {
        return $this->errorCode;
    }

}
