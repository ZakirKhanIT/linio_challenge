<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Application;

use ZakirKhanIT\Linio\Domain\Repository;
use ZakirKhanIT\Linio\Domain\Types\Collections\ItemsCollections;

final class Challenge
{
    private $repository;
    private $itemsCollections;

    public function __construct(Repository $repository)
    {
        $this->repository       = $repository;
        $this->itemsCollections = [];
    }

    public function __invoke(): ItemsCollections
    {
        $items = $this->repository->items();

        foreach ($items as $item) {
            $wordCheck                = new WordCheck();
            $this->itemsCollections[] = $wordCheck($item);
        }

        return new ItemsCollections($this->itemsCollections);

    }
}