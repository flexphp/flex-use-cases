<?php

namespace FlexPHP\UseCases\Tests\Mocks;

use FlexPHP\Repositories\Repository;
use FlexPHP\UseCases\Exception\UnavailableRepositoryUseCaseException;
use FlexPHP\UseCases\UseCase;

/**
 * Class UnavailableRepositoryMock
 * @package FlexPHP\UseCases\Tests\Mocks
 */
class UnavailableRepositoryMock extends Repository
{
    /**
     * @param array $item
     * @throws UnavailableRepositoryUseCaseException
     */
    public function push(array $item)
    {
        throw new UnavailableRepositoryUseCaseException();
    }
}
