<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Test\Domain\Types\Collections;

use Faker\Factory;
use ZakirKhanIT\Linio\Domain\Types\Collections\ItemsCollections;
use ZakirKhanIT\Linio\Test\Domain\ItemEntryStub;

final class ItemsCollectionsStub
{
    public static function create(array $items): ItemsCollections
    {
        return new ItemsCollections($items);
    }

    public static function random(): ItemsCollections
    {
        $totalItems = Factory::create()->numberBetween(1, 10);

        $collection = [];
        for ($i = 0; $i < $totalItems; $i++) {
            $collection[] = ItemEntryStub::random();
        }

        return self::create($collection);
    }
}