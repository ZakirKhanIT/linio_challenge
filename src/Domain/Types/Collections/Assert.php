<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Domain\Types\Collections;

use InvalidArgumentException;

final class Assert
{
    public static function arrayOf($class, $items)
    {
        foreach ($items as $item) {
            self::instanceOf($class, $item);
        }

    }

    public static function instanceOf($class, $item)
    {
        if (!$item instanceof $class) {
            throw new InvalidArgumentException(
                sprintf('The object <%s> is not an instance of <%s>', $class, get_class($item))
            );
        }
    }
}
