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

use FlexPHP\Messages\RequestInterface;

class RequestMock implements RequestInterface
{
    /**
     * @var string
     */
    public $foo;

    /**
     * @var string
     */
    public $bar;

    public function __construct(array $data = [])
    {
        $this->foo = $data['foo'] ?? $this->foo;
        $this->bar = $data['bar'] ?? $this->bar;
    }
}
