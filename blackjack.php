<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();

class Blackjack
{
    public $score;
    public $standScore;

    function hit()
    {
        $ranNum = rand(1, 11);
        $this->score = $_SESSION['score'];
        $_SESSION['score'] = $this->score += $ranNum;
        echo " ".$_SESSION['score'];
        if ($_SESSION['score'] > 21) {
            echo " <br/>YOU LOSE. GOODDAY SIR";
            $_SESSION['score'] = 0;
        }
        return $_SESSION['score'];
    }

    function getScore()
    {
        return $_SESSION['score'];
    }

    function stand(Blackjack $player, Blackjack $dealer)
    {

        echo "player had ". $player->getScore() . "<br/>";
        do {
            $dealer->hit();
            $_SESSION["Dealer"] = $dealer->getScore();
        } while ($dealer->getScore() < 15);

    }


    function surrender()
    {
        echo "<br/>Dealer Wins!";
        $_SESSION['score'] = 0;
    }
}

;


require 'home.php';
require 'game.php';
