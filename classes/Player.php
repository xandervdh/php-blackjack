<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private int $total = 0;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        $this->cards = [];
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    public function checkTotal(){

    }

    public function printTotal(){
        var_dump($this->cards);
    }
}