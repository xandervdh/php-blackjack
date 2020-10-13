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

    public function total(){
        for ($i = 0; $i < count($this->cards); $i++){
            echo $this->cards[$i]['card']['value'];
        }
    }

    public function printTotal(){
        var_dump($this->cards);
    }

    public function addCard($card){
        array_push($this->cards, $card);
        var_dump($this->cards);
        echo 'gave a card';
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