<?php

namespace MemMemov\Quatro;

class Links
{
    private $nodes;
    private $addresses;

    public function __construct(Nodes $nodes, Addresses $addresses)
    {
        $this->nodes = $nodes;
        $this->addresses = $addresses;
    }

    public function createTwo(): array
    {
        list($nodeAddress, $nodeReference, $siblingAddress, $siblingReference) = $this->addresses->createFour();

        return [
            new Link($this->nodes, $nodeAddress, $nodeReference),
            new Link($this->nodes, $siblingAddress, $siblingReference)
        ];
    }

    public function readTwo(Address $address): array
    {
        list($nodeAddress, $nodeReference, $siblingAddress, $siblingReference) = $this->addresses->readFour($address);

        return [
            new Link($this->nodes, $nodeAddress, $nodeReference),
            new Link($this->nodes, $siblingAddress, $siblingReference)
        ];
    }

    public function add(Record $previousRecord, Node $targetNode)
    {
        $this->addresses->add();

        return [
            new Link($this->nodes, $nodeAddress, $nodeReference),
            new Link($this->nodes, $siblingAddress, $siblingReference)
        ];
    }
}