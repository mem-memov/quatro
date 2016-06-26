<?php

namespace MemMemov\Quatro\store;

use PHPUnit\Framework\TestCase;

class ArrayStoreTest extends TestCase
{
    public function testItCreatesNodeRecord()
    {
        $store = new ArrayStore();

        $node_1 = $store->createNodeRecord();
        $node_2 = $store->createNodeRecord();
        $node_3 = $store->createNodeRecord();

        $this->assertSame([0, 0, 1, 0], $node_1);
        $this->assertSame([2, 2, 3, 0], $node_2);
        $this->assertSame([4, 4, 5, 0], $node_3);
    }
    
    public function testItCreatesLinkRecord()
    {
        $store = new ArrayStore();

        $node_1 = $store->createNodeRecord();
        $node_2 = $store->createNodeRecord();
        $node_3 = $store->createNodeRecord();

        $link_1_2 = $store->createLinkRecord($node_1[2], $node_2[0]);
        $link_1_3 = $store->createLinkRecord($link_1_2[2], $node_2[0]);
        var_dump($link_1_2);
        var_dump($link_1_3);
        $this->assertSame([6, 2, 7, 0], $link_1_2);
    }
}