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
use FlexPHP\UseCases\Exception\UnavailableRepositoryUseCaseException;

class UnavailableRepositoryMock extends Repository
{
    /**
     * @throws UnavailableRepositoryUseCaseException
     */
    public function push(array $item): void
    {
        throw new UnavailableRepositoryUseCaseException();
    }
}
