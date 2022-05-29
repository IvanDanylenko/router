<?php

namespace IvanDanylenko\Router\Exceptions;

class InvalidArgumentException extends HttpException
{
    public $code = 400;
    public $message = 'Invalid argument';

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}
