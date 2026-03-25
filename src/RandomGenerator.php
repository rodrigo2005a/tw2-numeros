<?php
class RandomGenerator
{
    private $n;
    private $min;
    private $max;
    private $numbers = [];
    private $sum = 0;
    private $average = 0.0;
    private $minValue = 0;
    private $maxValue = 0;

    public function __construct(int $n, int $min = 1, int $max = 10000)
    {
        $this->n = $n;
        $this->min = $min;
        $this->max = $max;
    }

    public function generate(): array
    {
        $this->numbers = [];
        $this->sum = 0;
        $first = true;

        for ($i = 0; $i < $this->n; $i++) {
            $num = random_int($this->min, $this->max);
            $this->numbers[] = $num;
            $this->sum += $num;

            if ($first) {
                $this->minValue = $num;
                $this->maxValue = $num;
                $first = false;
            } else {
                if ($num < $this->minValue) {
                    $this->minValue = $num;
                }
                if ($num > $this->maxValue) {
                    $this->maxValue = $num;
                }
            }
        }

        if ($this->n > 0) {
            $this->average = $this->sum / $this->n;
        }

        return $this->numbers;
    }

    public function getSum(): int
    {
        return $this->sum;
    }

    public function getAverage(): float
    {
        return $this->average;
    }

    public function getMin(): int
    {
        return $this->minValue;
    }

    public function getMax(): int
    {
        return $this->maxValue;
    }
}