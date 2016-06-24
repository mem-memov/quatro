<?php

namespace MemMemov\Quatro;

class Quatro
{
    private $addresses;
    private $nodes;
    
    public function __construct(StoreInterface $store)
    {
        $this->addresses = new Addresses($store);

        $this->nodes = new Nodes(
            new Records(
                new Links($this->addresses)
            )
        );
    }

    public function create(): Node
    {
        return $this->nodes->create();
    }

    public function read(int $id): Node
    {
        $address = $this->addresses->create($id);

        return $this->nodes->read($address);
    }
}