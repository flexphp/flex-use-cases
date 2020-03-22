<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\UseCases;

use FlexPHP\Repositories\RepositoryInterface;
use FlexPHP\UseCases\Exception\NotValidRequestException;
use FlexPHP\UseCases\Exception\UndefinedRepositoryUseCaseException;

abstract class UseCase implements UseCaseInterface
{
    /**
     * @var null|RepositoryInterface
     */
    private $repository;

    public function __construct(RepositoryInterface $repository = null)
    {
        if (!\is_null($repository)) {
            $this->setRepository($repository);
        }
    }

    public function setRepository(RepositoryInterface $repository): void
    {
        $this->repository = $repository;
    }

    /**
     * @throws UndefinedRepositoryUseCaseException
     */
    public function getRepository(): RepositoryInterface
    {
        if (\is_null($this->repository)) {
            throw new UndefinedRepositoryUseCaseException();
        }

        return $this->repository;
    }

    /**
     * @param mixed $requestUsed
     *
     * @throws NotValidRequestException
     */
    public function throwExceptionIfRequestNotValid(string $function, string $requestExpected, $requestUsed): void
    {
        if (!$requestUsed instanceof $requestExpected) {
            throw new NotValidRequestException($function, $requestExpected, $requestUsed);
        }
    }
}
