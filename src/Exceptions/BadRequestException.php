<?php

namespace IvanDanylenko\Router\Exceptions;

class BadRequestException extends HttpException
{
    public $code = 400;
    public $message = 'Bad request';
}
