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

class GatewayMock
{
    /**
     * @var array<int, array>
     */
    private $collection = [];

    /**
     * Add item in collection and return id assigned
     */
    public function create(array $item): int
    {
        $itemId = $this->count() + 1;
        $this->collection[$itemId] = $item;

        return $itemId;
    }

    /**
     * Get item in collection
     */
    public function read(int $itemId): ?array
    {
        if (!$this->exist($itemId)) {
            return null;
        }

        return $this->collection[$itemId];
    }

    /**
     * Edit item in collection
     */
    public function update(int $itemId, array $item): bool
    {
        if (!$this->exist($itemId)) {
            return false;
        }

        $this->collection[$itemId] = $item;

        return true;
    }

    /**
     * Remove item in collection
     */
    public function delete(int $itemId): bool
    {
        if (!$this->exist($itemId)) {
            return false;
        }

        unset($this->collection[$itemId]);

        return true;
    }

    private function exist(int $itemId): bool
    {
        return !empty($this->collection[$itemId]);
    }

    private function count(): int
    {
        return \count($this->collection);
    }
}
