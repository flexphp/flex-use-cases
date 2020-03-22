<?php declare(strict_types=1);
/*
 * This file is part of FlexPHP.
 *
 * (c) Freddie Gar <freddie.gar@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace FlexPHP\UseCases\Exception;

class NotValidRequestException extends \Exception implements UseCaseExceptionInterface
{
    /**
     * @param string $function
     * @param string $expected
     * @param mixed $used
     */
    public function __construct($function, $expected, $used)
    {
        $used = \is_object($used)
            ? \get_class($used)
            : \gettype($used);

        $message = \sprintf('Request for [%1$s] expected [%2$s] but used [%3$s]', $function, $expected, $used);

        parent::__construct($message);
    }
}
