<?php

namespace MemMemov\Quatro;

class Records
{
    private $links;

    public function __construct(Links $links)
    {
        $this->links = $links;
    }
    
    public function create(): Record
    {
        [$nodeLink, $siblingLink] = $this->links->createTwo();

        return new Record(
            $this,
            $nodeLink,
            $siblingLink
        );
    }

    public function add(Record $previousRecord, Node $targetNode)
    {
        [$nodeLink, $siblingLink] = $this->links->add($previousRecord, $targetNode);
        
        return new Record(
            $this,
            $nodeLink,
            $siblingLink
        );
    }
    
    public function remove(Record $previousRecord, Node $targetNode): void
    {
        $this->links->remove($previousRecord, $targetNode);
    }

    public function read(Address $address): Record
    {
        [$nodeLink, $siblingLink] = $this->links->readTwo($address);

        return new Record(
            $this,
            $nodeLink,
            $siblingLink
        );
    }
}