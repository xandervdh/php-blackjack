<?php
declare(strict_types=1);

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

class Player
{
    private array $cards;
    private bool $lost = false;
    public $hit;
    public $surrender;
    public $getScore;
    public $hasLost;
}