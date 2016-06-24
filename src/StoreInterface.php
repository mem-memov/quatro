<?php

namespace MemMemov\Quatro;

interface StoreInterface
{
    /**
     * @return int[] four integers: node address, node reference, sibling address, sibling reference
     */
    public function reserve(): array;

    /**
     * @param int $nodeAddress
     * @return int[] three integers: node reference, sibling address, sibling reference
     */
    public function provide(int $nodeAddress): array;

    /**
     * @param int $previousSiblingAddress
     * @param int $nodeReference
     * @return int[] three integers: node address, sibling address, sibling reference
     */
    public function add(int $previousSiblingAddress, int $nodeReference): array;
}