<?php

namespace MemMemov\Quatro;

class Link
{
    private $internalAddress;
    private $externalAddress;

    public function __construct(Address $internalAddress, Address $externalAddress)
    {
        $this->internalAddress = $internalAddress;
        $this->externalAddress = $externalAddress;
    }

    public function internalAddress(): Address
    {
        return $this->internalAddress;
    }
    
    public function readNode(Nodes $nodes): Node
    {
        return $nodes->read($this->externalAddress);
    }
    
    public function each(Records $records, Nodes $nodes, callable $callback): void
    {
        if (!$this->externalAddress->isEmpty()) {
            
            $record = $records->read($this->externalAddress);

            $node = $nodes->read($record->nodeAddress());

            $node->each($callback);
        }
    }

    public function remove(Node $node): void
    {
        $this->internalAddress->
    }
}