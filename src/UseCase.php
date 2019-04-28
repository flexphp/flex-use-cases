<?php

namespace FlexPHP\UseCases;

use FlexPHP\Repositories\RepositoryInterface;
use FlexPHP\UseCases\Exception\UndefinedRepositoryUseCaseException;

/**
 * Class UseCase
 * @package FlexPHP\UseCases
 */
abstract class UseCase implements UseCaseInterface
{
    /**
     * @var RepositoryInterface|null
     */
    private $repository = null;

    public function __construct(RepositoryInterface $repository = null)
    {
        if (!\is_null($repository)) {
            $this->setRepository($repository);
        }
    }

    public function setRepository(RepositoryInterface $repository): UseCaseInterface
    {
        $this->repository = $repository;

        return $this;
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
}
