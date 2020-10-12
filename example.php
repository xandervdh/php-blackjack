<?php
declare(strict_types=1);

require 'classes/Suit.php';
require 'classes/Card.php';
require 'classes/Deck.php';

$deck = new Deck();
$deck->shuffle();
foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}
