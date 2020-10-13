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

    public function lost(){
        if ($this->lost){
            return true;
        }else {
            return false;
        }
    }

    public function total(Card $card){
        return $card->getValue();
    }

    public function hit($deck)
    {
        $this->addCard($deck->drawCard());
        $this->calcTotal();
        if ($this->total > 21){
            $this->lost = true;
        }
        echo $this->getTotal() . ' hello <br>';
    }

    public function calcTotal(){
        $cards = $this->cards;
        for ($i = 0; $i < count($cards); $i++) {
            $this->total += $this->total($cards[$i]);
        }
        //echo $this->total . ' ';
        return $this->total . 'calc';
    }

    public function addCard($card){
        array_push($this->cards, $card);
        var_dump($this->cards);
        echo 'gave a card<br>';
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCards(array $cards): void
    {
        $this->cards = $cards;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    public function setTotal(int $total): void
    {
        $this->total = $total;
    }

    public function isLost(): bool
    {
        return $this->lost;
    }

    public function setLost(bool $lost): void
    {
        $this->lost = $lost;
    }


}