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
    public $drawMsg;
    public $image;
    public $newimg;

    public function __construct(int $score)
    {
        $this->score = $score;
    }


    function hit()
    {
        $ranNum = rand(1, 11);
        $this->drawMsg = $ranNum;
        $this->score += $ranNum;


        ////extra stuff to add images
        for ($i = 1; $i <= 11 ; $i++ ) {
            if ($ranNum == 10) {
                $figuresarray = ['JH', 'KH', 'QH'];
                $randIndex = array_rand($figuresarray);
                $this->image = $figuresarray[$randIndex].".png";
            }elseif ($ranNum == 1 || $ranNum == 11){
                $this->image = "AH.png";
            }

            elseif ($ranNum == $i) {
                $this->image = $i."H.png";
            }
        }


        return $this->drawMsg;
    }

    function getScore(): int
    {
        return $this->score;
    }

    function stand(Blackjack $player, Blackjack $dealer)
    {
        $playTotal = $player->getScore();

        do {
            $dealer->hit();
            $_SESSION["dealer"] = $dealer->getScore();
          array_push( $dealer->dealArray, $dealer->getScore());
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

}

;


