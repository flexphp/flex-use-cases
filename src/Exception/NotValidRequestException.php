<?php

namespace FlexPHP\UseCases\Exception;

class NotValidRequestException extends \Exception implements UseCaseExceptionInterface
{
    public function __construct($function, $expected, $used)
    {
        $used = \get_class($used);
        $message = \sprintf('Request for [%1$s] expected [%2$s] but used [%3$s]', $function, $expected, $used);

        parent::__construct($message);
    }
}
