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

use FlexPHP\Messages\ResponseInterface;

class ResponseMock implements ResponseInterface
{
    /**
     * @var int
     */
    private $response;

    public function __construct(int $data)
    {
        $this->response = $data;
    }

    public function response(): int
    {
        return $this->response;
    }
}
