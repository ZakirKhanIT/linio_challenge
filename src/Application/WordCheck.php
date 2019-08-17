<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Application;

use ZakirKhanIT\Linio\Domain\ItemEntry;
use ZakirKhanIT\Linio\Domain\Types\ItemIndex;
use ZakirKhanIT\Linio\Domain\Types\ItemMessage;

final class WordCheck
{
    const IT       = "IT";
    const LINIO    = "Linio";
    const LINIANOS = "Linianos";

    private $item;

    public function __invoke(int $index): ItemEntry
    {
        $this->item = $this->instanceEntry($index, (string)$index);

        $this->isMultipleOf($index, 3, self::LINIO);
        $this->isMultipleOf($index, 5, self::IT);
        $this->isMultipleOf($index, 15, self::LINIANOS);

        return $this->item;
    }

    private function isMultipleOf(int $index, int $denominator, string $message): void
    {
        if ($index % $denominator === 0) {
            $this->item = $this->instanceEntry($index, $message);
        }

    }

    private function instanceEntry(int $index, string $message): ItemEntry
    {
        $itemIndex   = new ItemIndex($index);
        $itemMessage = new ItemMessage($message);
        return new ItemEntry($itemIndex, $itemMessage);
    }
}