<?php

namespace FlexPHP\UseCases\Tests\Mocks;

use FlexPHP\Messages\RequestInterface;

/**
 * Class RequestMock
 * @package FlexPHP\UseCases\Tests\Mocks
 */
class RequestMock implements RequestInterface
{
    public $foo = null;
    public $bar = null;

    public function __construct(array $data = [])
    {
        $this->foo = $data['foo'] ?? $this->foo;
        $this->bar = $data['bar'] ?? $this->bar;
    }
}
