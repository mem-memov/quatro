<?php

namespace MemMemov\Quatro;

class Node
{
    private $nodes;
    private $record;
    
    public function __construct(Nodes $nodes, Record $record)
    {
        $this->nodes = $nodes;
        $this->record = $record;
    }
    
    public function id(): int
    {
        return $this->record->nodeAddress()->value();
    }
    
    public function add(Node $node): void
    {
        $this->record->add($node);
    }

    public function remove(Node $node): void
    {
        $this->record->remove($node);
    }

    public function each(callable $callback): void
    {
        $this->record->each($this->nodes, $callback);
    }
}