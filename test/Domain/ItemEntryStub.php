<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Test\Domain;

use ZakirKhanIT\Linio\Domain\ItemEntry;
use ZakirKhanIT\Linio\Domain\Types\ItemIndex;
use ZakirKhanIT\Linio\Domain\Types\ItemMessage;
use ZakirKhanIT\Linio\Test\Domain\Types\ItemIndexStub;
use ZakirKhanIT\Linio\Test\Domain\Types\ItemMessageStub;

final class ItemEntryStub
{
    public static function create(ItemIndex $index, ItemMessage $message): ItemEntry
    {
        return new ItemEntry($index, $message);
    }

    public static function random(): ItemEntry
    {
        $code        = ItemIndexStub::random();
        $description = ItemMessageStub::random();

        return self::create($code, $description);
    }
}