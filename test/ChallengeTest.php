<?php
declare(strict_types=1);

namespace ZakirKhanIT\Linio\Test;

use ZakirKhanIT\Linio\Application\Challenge;
use ZakirKhanIT\Linio\Domain\Types\ItemIndex;
use ZakirKhanIT\Linio\Infrastructure\InMemoryRepository;
use ZakirKhanIT\Linio\Test\Domain\ItemEntryStub;
use ZakirKhanIT\Linio\Test\Domain\Types\Collections\ItemsCollectionsStub;
use ZakirKhanIT\Linio\Test\Domain\Types\ItemMessageStub;
use Mockery;
use PHPUnit\Framework\TestCase;

final class ChallengeTest extends TestCase
{
    /** @var InMemoryRepository|Mockery\MockInterface|null */
    private $repository;
    /** @var Challenge|null */
    private $challange;

    public function setUp(): void
    {
        parent::setUp();
        $this->repository = Mockery::mock(InMemoryRepository::class);
        $this->challange  = new  Challenge($this->repository);
    }

    public function tearDown(): void
    {
        $this->challange = null;
    }

    public function testRepositoryInstanceChallenge(): void
    {
        $items      = [];
        $collection = [];
        for ($index = 1; $index <= 10; $index++) {
            $items[]      = $index;
            $itemIndex    = ItemIndex::create($index);
            $itemMessage  = ItemMessageStub::withMultiple($index);
            $collection[] = ItemEntryStub::create($itemIndex, $itemMessage);
        }

        $itemsCollection = ItemsCollectionsStub::create($collection);

        $this->repository
            ->shouldReceive('items')
            ->once()
            ->andReturn($items);

        $response = $this->challange->__invoke();

        $this->assertEquals($response, $itemsCollection);
    }
}