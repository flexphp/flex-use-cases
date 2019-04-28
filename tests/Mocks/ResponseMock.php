<?php

namespace FlexPHP\UseCases\Tests\Mocks;

use FlexPHP\Messages\ResponseInterface;

/**
 * Class ResponseMock
 * @package FlexPHP\UseCases\Tests\Mocks
 */
class ResponseMock implements ResponseInterface
{
    private $response = null;

    public function __construct($data)
    {
        $this->response = $data;
    }

    public function response()
    {
        return $this->response;
    }
}
