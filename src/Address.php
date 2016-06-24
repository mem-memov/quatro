<?php

namespace MemMemov\Quatro;

class Address
{
    private $value;
    
    public function __create(int $value)
    {
        $this->value = $value;
    }
    
    public function value(): int
    {
        return $this->value;
    }

    public function isEmpty()
    {
        return 0 === $this->value;
    }
}