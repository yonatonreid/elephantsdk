<?php
declare(strict_types=1);

namespace Elephant\Spl\Ds;

class SplHeap extends \SplHeap
{
    protected bool $sortGreaterThan = false;

    /**
     * @inheritDoc
     */
    protected function compare($value1, $value2)
    {
        if ($value1 === $value2) {
            return 0;
        }
        // TODO
        if ($this -> sortGreaterThan) {
            return $value1 < $value2 ? -1 : 1;
        }
        return $value1 < $value2 ? 1 : -1;
    }
}