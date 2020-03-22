<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\UseCases\Tests\Mocks;

use Exception;
use FlexPHP\UseCases\Exception\UnavailableRepositoryUseCaseException;
use FlexPHP\UseCases\UseCase;

/**
 * @method RepositoryMock getRepository()
 */
class UseCaseMock extends UseCase
{
    /**
     * Use case mock
     *
     * @param mixed|RequestMock $request
     *
     * @return ResponseMock
     */
    public function execute($request)
    {
        $this->throwExceptionIfRequestNotValid(__FUNCTION__, RequestMock::class, $request);

        $item = [];
        $item['foo'] = $request->foo;
        $item['bar'] = $request->bar;

        try {
            $response = $this->getRepository()->push($item);
        } catch (Exception $exception) {
            throw new UnavailableRepositoryUseCaseException($exception->getMessage());
        }

        return new ResponseMock($response);
    }
}
