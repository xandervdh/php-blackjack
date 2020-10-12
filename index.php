<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require 'classes/Suit.php';
require 'classes/Card.php';
require 'classes/Deck.php';
require 'classes/Player.php';
require 'classes/Blackjack.php';
session_start();

$deck = new Deck();
$deck->shuffle();
$game = new Blackjack();
$_SESSION['game'] = $game;
/*foreach($deck->getCards() AS $card) {
    echo $card->getUnicodeCharacter(true);
    echo '<br>';
}*/

$player = new Player($deck);

