<?php

class MinStack {
    private array $stack = [];
    private array $minStack = [];

    public function push(int $val): void
    {
        $this->stack[] = $val;

        if (empty($this->minStack) || $val <= end($this->minStack)) {
            $this->minStack[] = $val;
        }
    }

    public function pop(): void
    {
        $top = array_pop($this->stack);

        if ($top === end($this->minStack)) {
            array_pop($this->minStack);
        }
    }

    public function top(): ?int
    {
        return !empty($this->stack) ? end($this->stack) : null;
    }

    public function getMin() {
        return !empty($this->minStack) ? end($this->minStack) : null;
    }
}

$obj = new MinStack();
$obj->push(5);
$obj->push(1);
$obj->push(3);
$obj->push(7);
$obj->pop();
$ret_3 = $obj->top();
$ret_4 = $obj->getMin();
