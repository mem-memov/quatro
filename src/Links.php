<?php

namespace MemMemov\Quatro;

class Links
{
    private $addresses;

    public function __construct(Addresses $addresses)
    {
        $this->addresses = $addresses;
    }

    public function createTwo(): array
    {
        [$nodeAddress, $nodeReference, $siblingAddress, $siblingReference] = $this->addresses->createFour();

        return [
            new Link($nodeAddress, $nodeReference),
            new Link($siblingAddress, $siblingReference)
        ];
    }

    public function readTwo(Address $address): array
    {
        [$nodeAddress, $nodeReference, $siblingAddress, $siblingReference] = $this->addresses->readFour($address);

        return [
            new Link($nodeAddress, $nodeReference),
            new Link($siblingAddress, $siblingReference)
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