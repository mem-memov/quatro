<?php

namespace MemMemov\Quatro;

class Addresses
{
    private $store;
    
    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    public function create(int $address): Address
    {
        return new Address($address);
    }
    
    public function createFour(): array
    {
        list($nodeAddress, $nodeReference, $siblingAddress, $siblingReference) = $this->store->reserve();
        
        return [
            new Address($nodeAddress),
            new Address($nodeReference),
            new Address($siblingAddress),
            new Address($siblingReference)
        ];
    }

    public function readFour(Address $nodeAddress): array
    {
        list($nodeReference, $siblingAddress, $siblingReference) = $this->store->provide(
            $nodeAddress->value()
        );

        return [
            $nodeAddress,
            new Address($nodeReference),
            new Address($siblingAddress),
            new Address($siblingReference)
        ];
    }

    public function add(Address $previousSiblingAddress, Address $nodeReference)
    {
        list($nodeAddress, $siblingAddress, $siblingReference) = $this->store->add(
            $previousSiblingAddress->value(),
            $nodeReference->value()
        );

        return [
            new Address($nodeAddress),
            new Address($nodeReference),
            new Address($siblingAddress),
            new Address($siblingReference)
        ];
    }
}