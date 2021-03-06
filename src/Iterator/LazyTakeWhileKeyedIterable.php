<?php

namespace Collections\Iterator;

use Collections\Iterable;

class LazyTakeWhileKeyedIterable implements Iterable
{
    use LazyIterableTrait;

    /**
     * @var Iterable
     */
    private $iterable;

    /**
     * @var callable
     */
    private $fn;

    public function __construct($iterable, $fn)
    {
        $this->iterable = $iterable;
        $this->fn = $fn;
    }

    public function getIterator()
    {
        return new LazyTakeWhileKeyedIterator($this->iterable->getIterator(), $this->fn);
    }
}