<?php


class Blackjack
{
    private $player;
    private $dealer;
    private $deck;

    public function __constructor(){
        $this->deck = new Deck();
        $this->deck->shuffle();
        $this->player = new Player();
        $this->dealer = new Player();
    }

    public function getPlayer()
    {
        return $this->player;
    }

    public function getDealer()
    {
        return $this->dealer;
    }
}