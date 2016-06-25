<?php

namespace MemMemov\Quatro\store;

use MemMemov\Quatro\StoreInterface;

class ArrayStore implements StoreInterface
{
    private $data;
    
    public function __construct()
    {
        $this->data = [];
    }

    public function reserve(): array
    {
        $nodeAddress = count($this->data);
        $nodeReference = $nodeAddress;
        $siblingAddress = $nodeAddress + 1;
        $siblingReference = 0;

        $this->data[] = $nodeReference;
        $this->data[] = $siblingReference;

        return [
            $nodeAddress,
            $nodeReference,
            $siblingAddress,
            $siblingReference
        ];
    }

    public function provide(int $nodeAddress): array
    {
        $siblingAddress = $nodeAddress + 1;

        return [
            $this->data[$nodeAddress],
            $siblingAddress,
            $this->data[$siblingAddress]
        ];
    }

    public function add(int $previousSiblingAddress, int $nodeReference): array
    {
        [$nodeAddress, $emptyNodeReference, $siblingAddress, $emptySiblingReference] = $this->reserve();

        $this->data[$previousSiblingAddress] = $nodeAddress;
        $this->data[$nodeAddress] = $nodeReference;

        return [
            $nodeAddress,
            $siblingAddress,
            $emptySiblingReference
        ];
    }

    public function remove(int $previousSiblingAddress): void
    {
        $removedNodeAddress = $this->data[$previousSiblingAddress];
        $removeSiblingAddress = $removedNodeAddress + 1;
        $nextNodeAddress = $this->data[$removeSiblingAddress];
        $this->data[$previousSiblingAddress] = $nextNodeAddress;

        $this->data[$removedNodeAddress] = 0;
        $this->data[$removeSiblingAddress] = 0;
    }
}