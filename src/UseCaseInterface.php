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

use FlexPHP\Messages\RequestInterface;
use FlexPHP\Messages\ResponseInterface;
use FlexPHP\Repositories\RepositoryInterface;

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
     */
    public function setRepository(RepositoryInterface $repository): void;

    /**
     * Get repository setup by constructor or setRepository method
     */
    public function getRepository(): RepositoryInterface;

    /**
     * Valid request in execute method is allowed
     *
     * @param mixed $requestUsed
     */
    public function throwExceptionIfRequestNotValid(string $function, string $requestExpected, $requestUsed): void;

    /**
     * Execute use case and return response
     *
     * @param RequestInterface $request
     *
     * @return ResponseInterface
     */
    public function execute($request);
}
