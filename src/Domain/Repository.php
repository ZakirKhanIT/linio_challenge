<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Domain;

interface Repository
{
    public function items(): array;
}