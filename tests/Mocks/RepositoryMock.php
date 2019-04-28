<?php

namespace FlexPHP\UseCases\Tests\Mocks;

use FlexPHP\Repositories\Repository;
use FlexPHP\UseCases\UseCase;

/**
 * Class RepositoryMock
 * @package FlexPHP\UseCases\Tests\Mocks
 * @method GatewayMock getGateway()
 */
class RepositoryMock extends Repository
{
    /**
     * @param array $item
     * @return int
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     */
    public function push(array $item)
    {
        return $this->getGateway()->create($item);
    }
}
