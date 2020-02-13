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
    public $disabled;
    public $surReplay = "Surrender";
// don't write SESSION inside of functions here, move it to game.php
    function hit()
    {
        $ranNum = rand(1, 11);
        $this->score = $_SESSION['score'];
        $_SESSION['score'] = $this->score += $ranNum;
        echo " " . $_SESSION['score'];
        if ($_SESSION['score'] > 21) {
            $this->disabled =  "disabled";
            $this->surReplay = "New game";
        }
        return $_SESSION['score'];

    }

    function getScore()
    {
        return $_SESSION['score'];
    }

    function stand(Blackjack $player, Blackjack $dealer)
    {
        echo "player had " . $player->getScore() . "<br/>";
        $playTotal = $player->getScore();
        $_SESSION['score'] = 0;
        echo "Dealer cards </br>";
        do {
            $dealer->hit();
            echo "<br/>";
            $_SESSION["Dealer"] = $dealer->getScore();
        } while ($dealer->getScore() < 15);


        if ($dealer->getScore() > 21) {
            echo "<br/>DEALER BUSTS </br> YOU WIN!";
            $this->disabled =  "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() >= $playTotal && $dealer->getScore() <= 21) {
            echo "<br/>DEALER BEAT YO ASS";
            $this->disabled =  "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() < $playTotal) {
            echo "<br/>YOU WIN, DEALER LOST";
            $this->disabled =  "disabled";
            $this->surReplay = "New game";
        }
    }


    function surrender()
    {
        $_SESSION['score'] = 0;
    }
}

;


