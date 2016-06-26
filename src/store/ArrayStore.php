<?php

namespace MemMemov\Quatro\store;

use MemMemov\Quatro\StoreInterface;

class ArrayStore implements StoreInterface
{
    private $data;
    
    public function __construct(int $size)
    {
        $this->data = [];
    }

    public function createNodeRecord(): array
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

    public function createLinkRecord(int $previousSiblingAddress, int $nodeReference): array
    {
        $nodeAddress = count($this->data);
        $siblingAddress = $nodeAddress + 1;
        $siblingReference = 0;

        $this->data[] = $nodeReference;
        $this->data[] = $siblingReference;

        $this->data[$previousSiblingAddress] = $nodeAddress;

        return [
            $nodeAddress,
            $nodeReference,
            $siblingAddress,
            $siblingReference
        ];
    }

    public function readRecord(int $nodeAddress): array
    {
        $siblingAddress = $nodeAddress + 1;

        return [
            $nodeAddress,
            $this->data[$nodeAddress],
            $siblingAddress,
            $this->data[$siblingAddress]
        ];
    }

    public function deleteLinkRecord(int $previousSiblingAddress): void
    {
        $removedNodeAddress = $this->data[$previousSiblingAddress];
        $removeSiblingAddress = $removedNodeAddress + 1;
        $nextNodeAddress = $this->data[$removeSiblingAddress];
        $this->data[$previousSiblingAddress] = $nextNodeAddress;

        $this->data[$removedNodeAddress] = 0;
        $this->data[$removeSiblingAddress] = 0;
    }

    public function dump(): string
    {
        $dump = '';

        foreach ($this->data as $address) {
            
        }

        return $dump;
    }
}