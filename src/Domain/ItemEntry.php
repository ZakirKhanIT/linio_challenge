<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Domain;

use JsonSerializable;
use ZakirKhanIT\Linio\Domain\Types\ItemIndex;
use ZakirKhanIT\Linio\Domain\Types\ItemMessage;

final class ItemEntry implements JsonSerializable
{
    private $index;
    private $message;

    public function __construct(ItemIndex $index, ItemMessage $message)
    {
        $this->index   = $index;
        $this->message = $message;
    }

    public function index(): ItemIndex
    {
        return $this->index;
    }

    public function message(): ItemMessage
    {
        return $this->message;
    }

    public function jsonSerialize(): array
    {
        return [
            'index'   => $this->index()->value(),
            'message' => $this->message()->value()
        ];
    }
}