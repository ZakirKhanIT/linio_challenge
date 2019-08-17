<?php
declare(strict_types=1);

use ZakirKhanIT\Linio\Application\Challenge;
use ZakirKhanIT\Linio\Infrastructure\InMemoryRepository;

require_once __DIR__ . '/vendor/autoload.php';

$repository = new InMemoryRepository();
$app = new Challenge($repository);

//TODO: This is just a basic controller, you can display the data according to your convenience.
print(json_encode($app(), JSON_PRETTY_PRINT));

