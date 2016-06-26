<?php

namespace MemMemov\Quatro;

use MemMemov\Quatro\StoreInterface;
use MemMemov\Quatro\Node;
use MemMemov\Quatro\Quatro;
use PHPUnit\Framework\TestCase;

class QuatroTest extends TestCase
{
/*    protected $store;

    protected function setUp()
    {
        $this->store = $this->createMock(StoreInterface::class);
    }

    public function testItCreatesNode()
    {
        $quatro = new Quatro($this->store);

        $this->store->expects($this->once())
            ->method('reserve')
            ->willReturn([1,2,3,4]);

        $result = $quatro->create();

        $this->assertInstanceOf(Node::class, $result);

        $this->assertEquals($result->id(), 1);
    }*/
}