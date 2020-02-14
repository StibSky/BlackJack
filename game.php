<?php
require("blackjack.php");
session_start();

if (isset($_SESSION["player"])) {
    $player = new Blackjack($_SESSION["player"]);
} else {
    $_SESSION["player"] = 0;
    $player = new Blackjack($_SESSION["player"]);
}

if (isset($_SESSION["dealer"])) {
    $dealer = new Blackjack($_SESSION["dealer"]);
} else {
    $_SESSION["dealer"] = 0;
    $dealer = new Blackjack($_SESSION["dealer"]);
}



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['hitButton'] == 1) {
        $player->hit();
        $_SESSION["player"] = $player->getScore();

        if ($player->getScore() > 21) {
            $player->dealMessage= " <br/>BUST, YOU LOSE, GOOD DAY SIR";
            session_destroy();
            $player->disabled = "disabled";
            $player->surReplay = "New game";
        }
    }
    if ($_POST['hitButton'] == 2) {
        $player->stand($player, $dealer);
    }
    if ($_POST['hitButton'] == 3) {
        session_destroy();
    }
}






