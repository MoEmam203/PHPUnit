<?php

namespace App\Support;

use ArrayIterator;
use IteratorAggregate;
use JsonSerializable;
use Traversable;

class Collection implements IteratorAggregate , JsonSerializable{

    protected $items = [];

    public function __construct(array $items = [])
    {
        $this->items = $items;
    }
    public function get()
    {
        return $this->items;
    }

    public function count()
    {
        return count($this->items);
    }

    public function add(array $items)
    {
        $this->items =  array_merge($this->items,$items);
    }

    public function toJson()
    {
        return json_encode($this->items);
    }

    public function merge(Collection $collection)
    {
        // // if we store the return to new collection
        // return new Collection(array_merge($this->get(),$collection->get()));

        // if we affect exists collection
        return $this->add($collection->get());
    }

    public function getIterator() : Traversable
    {
        return new ArrayIterator($this->items);
    }

    public function jsonSerialize()
    {
        return $this->items;
    }
}