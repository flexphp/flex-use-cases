<?php

namespace FlexPHP\UseCases;

use FlexPHP\Messages\RequestInterface;
use FlexPHP\Messages\ResponseInterface;
use FlexPHP\Repositories\RepositoryInterface;

/**
 * Interface UseCaseInterface
 * @package FlexPHP\UseCases
 */
interface UseCaseInterface
{
    /**
     * Set repository from constructor
     *
     * @param RepositoryInterface $repository
     */
    public function __construct(RepositoryInterface $repository = null);

    /**
     * Set repository to use
     *
     * @param RepositoryInterface $repository
     * @return UseCaseInterface
     */
    public function setRepository(RepositoryInterface $repository): self;

    /**
     * Get repository setup by constructor or setRepository method
     *
     * @return RepositoryInterface
     */
    public function getRepository(): RepositoryInterface;

    /**
     * Valid request in execute method is allowed
     *
     * @param string $function
     * @param string $requestExpected
     * @param mixed $requestUsed
     * @return void
     */
    public function throwExceptionIfRequestNotValid(string $function, string $requestExpected, $requestUsed): void;

    /**
     * Execute use case and return response
     *
     * @param RequestInterface $request
     * @return ResponseInterface
     */
    public function execute($request);
}
