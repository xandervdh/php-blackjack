<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;
    public $hit;
    public $surrender;
    public $getScore;
    public $hasLost;

    public function __construct(Deck $deck)
    {
        $cards = array();
        array_push($cards, $deck->drawCard());
        array_push($cards, $deck->drawCard());
        $this->cards = $cards;
    }


}