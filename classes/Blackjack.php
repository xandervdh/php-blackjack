git <?php


class Blackjack
{
    private $player;
    private $dealer;
    private $deck;

    public function __constructor(){
        $this->player = new Player();
        $this->dealer = new Player();
        $this->deck = new Deck();
        $this->deck->shuffle();
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