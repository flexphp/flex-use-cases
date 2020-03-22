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

use FlexPHP\Repositories\Repository;

/**
 * @method GatewayMock getGateway()
 */
class RepositoryMock extends Repository
{
    /**
     * @throws \FlexPHP\Repositories\Exception\UndefinedGatewayRepositoryException
     *
     * @return int
     */
    public function push(array $item)
    {
        return $this->getGateway()->create($item);
    }
}
