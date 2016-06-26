<?php

namespace MemMemov\Quatro;

interface StoreInterface
{
    /**
     * @return int[] four integers: node address, node reference, sibling address, sibling reference
     */
    public function createNodeRecord(): array;

    /**
     * @param int $previousSiblingAddress
     * @param int $nodeReference
     * @return int[] four integers: target node address, target node reference, sibling address, sibling reference
     */
    public function createLinkRecord(int $previousSiblingAddress, int $nodeReference): array;

    /**
     * @param int $nodeAddress
     * @return int[] four integers: node address, node reference, sibling address, sibling reference
     */
    public function readRecord(int $nodeAddress): array;

    /**
     * @param int $previousSiblingAddress
     */
    public function deleteLinkRecord(int $previousSiblingAddress): void;
}