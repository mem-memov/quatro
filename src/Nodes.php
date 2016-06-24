<?php

namespace MemMemov\Quatro;

class Nodes
{
    private $records;
    
    public function __construct(Records $records)
    {
        $this->records = $records;
    }
    
    public function create(): Node
    {
        return new Node(
            $this,
            $this->records->create()
        );
    }
    
    public function read(Address $address): Node
    {
        return new Node(
            $this,
            $this->records->read($address)
        );
    }
}