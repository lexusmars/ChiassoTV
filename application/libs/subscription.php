<?php


class Subscription
{
    private $days;
    private $cost;
    private $name;

    public function __construct(string $name, int $days, float $cost)
    {
        $this->days = $days;
        $this->cost = $cost;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getDays(): int
    {
        return $this->days;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}