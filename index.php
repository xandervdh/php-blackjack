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

$game = new Blackjack();
$deck = $game->getDeck();
$player = $game->getPlayer();
$dealer = $game->getDealer();

if (!isset($_SESSION['game'])) {
    $_SESSION['game'] = $game;
} else {
    $game = $_SESSION['game'];
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'hit') {
        $player->hit($deck);
    } elseif ($_POST['action'] == 'stand') {
        $game->stand();
    } elseif ($_POST['action'] == 'surrender') {
        $player->surrender();
    }
    if ($game->getPlayer()->isLost()) {
        echo '<br>lost<br>';
    }
}

if ($player->lost()) {
    unset($_SESSION['game']);
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<form method="post">
    <input type="submit" name="action" value="hit">
    <input type="submit" name="action" value="stand">
    <input type="submit" name="action" value="surrender">
</form>
<div style="font-size: 50px">
<?php
echo 'Dealer: ' . $dealer->calcTotal() . '<br>';
echo 'Player:' . $player->calcTotal() . '<br>';
foreach ($dealer->getCards() as $card) {
    echo $card->getUnicodeCharacter(true);
}
    echo '<br>';
foreach ($player->getCards() as $card) {
    echo $card->getUnicodeCharacter(true);
}
?>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>
