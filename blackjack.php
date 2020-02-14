<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


class Blackjack
{

    public $score;
    public $standScore;
    public $disabled;
    public $surReplay = "Surrender";
    public $dealMessage = "result";
    public $dealArray = [];

    public function __construct(int $score)
    {
        $this->score = $score;
    }

    function hit()
    {
        $ranNum = rand(1, 11);
        $this->score += $ranNum;
        echo  "<br/>$this->score";

    }

    function getScore(): int
    {
        return $this->score;
    }

    function stand(Blackjack $player, Blackjack $dealer)
    {
        echo "player had " . $player->getScore() . "<br/>";
        $playTotal = $player->getScore();
        echo "Dealer cards </br>";
        do {
            $dealer->hit();
            $_SESSION["dealer"] = $dealer->getScore();
          array_push( $this->dealArray, $dealer->getScore());
        } while ($dealer->getScore() < 15);


        if ($dealer->getScore() > 21) {
            $this->dealMessage = "<br/>DEALER BUSTS </br> YOU WIN!";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() >= $playTotal && $dealer->getScore() <= 21) {
            $this->dealMessage =  "<br/>DEALER BEAT YO ASS";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() < $playTotal) {
            $this->dealMessage =  "<br/>YOU WIN, DEALER LOST";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        }
    }


    function surrender()
    {
     unset($_SESSION);
    }
}

;


