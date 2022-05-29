<?php

namespace IvanDanylenko\Router\Exceptions;

class NotFoundException extends HttpException
{
    public $code = 404;
    public $message = 'Route not found';

    public function __construct(string $message)
    {
        $this->message = $message;
    }
}
