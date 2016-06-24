<?php

namespace MemMemov\Quatro;

class Record
{
    private $records;
    private $nodeLink;
    private $siblingLink;
    
    public function __construct(Records $records, Link $nodeLink, Link $siblingLink)
    {
        $this->records = $records;
        $this->nodeLink = $nodeLink;
        $this->siblingLink = $siblingLink;
    }
    
    public function nodeAddress(): Address
    {
        return $this->nodeLink->internalAddress();
    }
    
    public function add(Node $node)
    {
        $this->records->add($this, $node);
    }

    public function each(Nodes $nodes, callable $callback): void
    {
        $node = $this->nodeLink->readNode($nodes);
        
        $toBeContinued = $callback($node);
        
        if (false !== $toBeContinued) {
            $this->siblingLink->each($this->records, $nodes, $callback);
        }
    }
}