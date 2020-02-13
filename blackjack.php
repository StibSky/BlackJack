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
            $_SESSION["Dealer"] = $dealer->getScore();
        } while ($dealer->getScore() < 15);


        if ($dealer->getScore() > 21) {
            echo "<br/>DEALER BUSTS </br> YOU WIN!";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() >= $playTotal && $dealer->getScore() <= 21) {
            echo "<br/>DEALER BEAT YO ASS";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        } elseif ($dealer->getScore() < $playTotal) {
            echo "<br/>YOU WIN, DEALER LOST";
            $this->disabled = "disabled";
            $this->surReplay = "New game";
        }
    }


    function surrender()
    {
        $_SESSION['score'] = 0;
    }
}

;


