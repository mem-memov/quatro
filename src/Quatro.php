<?php

namespace MemMemov\Quatro;

class Quatro
{
    private $nodes;
    
    public function __construct(StoreInterface $store)
    {
        $this->nodes = new Nodes(
            new Records(
                new Links(
                    new Addresses($store)
                )
            )
        );
    }
    
    public function nodes(): Nodes
    {
        return $this->nodes;
    }
}