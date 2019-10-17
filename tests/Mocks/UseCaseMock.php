<?php

namespace FlexPHP\UseCases\Tests\Mocks;

use FlexPHP\UseCases\UseCase;
use FlexPHP\UseCases\Exception\UnavailableRepositoryUseCaseException;
use FlexPHP\UseCases\Tests\Mocks\ResponseMock;
use FlexPHP\UseCases\Tests\Mocks\RequestMock;
use Exception;

/**
 * Class UseCaseMock
 * @package FlexPHP\UseCases\Tests\Mocks
 * @method RepositoryMock getRepository()
 */
class UseCaseMock extends UseCase
{
    /**
     * Use case mock
     *
     * @param RequestMock $request
     * @return ResponseMock
     */
    public function execute($request)
    {
        $item = [];
        $item['foo'] = $request->foo;
        $item['bar'] = $request->bar;

        try {
            $response = $this->getRepository()->push($item);
        } catch(Exception $exception) {
            throw new UnavailableRepositoryUseCaseException($exception->getMessage());
        }

        return new ResponseMock($response);
    }
}
