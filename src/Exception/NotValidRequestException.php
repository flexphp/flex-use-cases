<?php

namespace FlexPHP\UseCases\Exception;

class NotValidRequestException extends \Exception implements UseCaseExceptionInterface
{
    /**
     * @param string $function
     * @param string $expected
     * @param mixed $used
     */
    public function __construct($function, $expected, $used)
    {
        $used = \is_object($used)
            ? \get_class($used)
            : \gettype($used);

        $message = \sprintf('Request for [%1$s] expected [%2$s] but used [%3$s]', $function, $expected, $used);

        parent::__construct($message);
    }
}
