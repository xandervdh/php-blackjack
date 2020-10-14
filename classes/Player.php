<?php
declare(strict_types=1);

class Player
{
    private array $cards;
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        $this->cards = [];
        array_push($this->cards, $deck->drawCard(), $deck->drawCard());
    }

    public function lost()
    {
        if ($this->lost) {
            return true;
        } else {
            return false;
        }
    }

    public function hit($deck)
    {
        $this->addCard($deck->drawCard());
        $this->calcTotal();
        if ($this->calcTotal() > 21) {
            $this->lost = true;
        }
    }

    public function calcTotal()
    {
        $total = 0;
        $cards = $this->cards;
        for ($i = 0; $i < count($cards); $i++) {
            $total += $this->cards[$i]->getValue();
        }

        return $total;
    }

    public function addCard($card)
    {
        array_push($this->cards, $card);
        echo 'gave a card<br>';
    }

    public function surrender(): void
    {
        $this->lost = true;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

    public function setCards(array $cards): void
    {
        $this->cards = $cards;
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

class Dealer extends Player{
    public function dealerHit(Deck $deck){
        while ($this->calcTotal() < 15){
            parent::hit($deck);
        }
    }
}