<?php

namespace FlexPHP\UseCases\Tests\Unit;

use FlexPHP\Messages\ResponseInterface;
use FlexPHP\UseCases\Exception\NotValidRequestException;
use FlexPHP\UseCases\Exception\UnavailableRepositoryUseCaseException;
use FlexPHP\UseCases\Exception\UndefinedRepositoryUseCaseException;
use FlexPHP\UseCases\UseCaseInterface;
use FlexPHP\UseCases\Tests\Mocks\GatewayMock;
use FlexPHP\UseCases\Tests\Mocks\RequestMock;
use FlexPHP\UseCases\Tests\Mocks\RepositoryMock;
use FlexPHP\UseCases\Tests\Mocks\RequestNotValidMock;
use FlexPHP\UseCases\Tests\Mocks\UnavailableRepositoryMock;
use FlexPHP\UseCases\Tests\Mocks\UseCaseMock;
use FlexPHP\UseCases\Tests\TestCase;

class UseCaseTest extends TestCase
{
    public function testItUseInterface()
    {
        $useCase = new UseCaseMock();

        $this->assertInstanceOf(UseCaseInterface::class, $useCase);
    }

    /**
     * @throws UndefinedRepositoryUseCaseException
     */
    public function testItInitializeWithRepository()
    {
        $foo = 'Hello';
        $bar = 'World';
        $gateway = new GatewayMock();
        $repository = new RepositoryMock($gateway);
        $request = new RequestMock(\compact('foo', 'bar'));
        $useCase = new UseCaseMock($repository);

        $response = $useCase->execute($request);

        $this->assertSame($repository, $useCase->getRepository());
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(1, $response->response());
    }

    /**
     * @throws UndefinedRepositoryUseCaseException
     */
    public function testItInitializeRepositoryUsingSetter()
    {
        $foo = 'Hello';
        $bar = 'World';
        $gateway = new GatewayMock();
        $repository = new RepositoryMock($gateway);
        $request = new RequestMock(\compact('foo', 'bar'));
        $useCase = new UseCaseMock();
        $useCase->setRepository($repository);

        $response = $useCase->execute($request);

        $this->assertSame($repository, $useCase->getRepository());
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertSame(1, $response->response());
    }

    /**
     * @throws NotValidRequestException
     */
    public function testItGetNotValidRequestThrowException()
    {
        $this->expectException(NotValidRequestException::class);
        $this->expectExceptionMessage('Request');

        $useCase = new UseCaseMock();
        $useCase->execute(new RequestNotValidMock());
    }

    /**
     * @throws NotValidRequestException
     */
    public function testItGetNotValidRequestNotClassThrowException()
    {
        $this->expectException(NotValidRequestException::class);
        $this->expectExceptionMessage('Request');

        $useCase = new UseCaseMock();
        $useCase->execute([]);
    }

    /**
     * @throws UndefinedRepositoryUseCaseException
     */
    public function testItGetUndefinedRepositoryThrowException()
    {
        $this->expectException(UndefinedRepositoryUseCaseException::class);

        $useCase = new UseCaseMock();
        $useCase->getRepository();
    }

    /**
     * @throws UnavailableRepositoryUseCaseException
     */
    public function testItGetUnavailableRepositoryThrowException()
    {
        $this->expectException(UnavailableRepositoryUseCaseException::class);

        $repository = new UnavailableRepositoryMock();
        $useCase = new UseCaseMock($repository);
        $useCase->execute(new RequestMock());
    }
}
