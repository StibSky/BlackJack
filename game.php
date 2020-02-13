<?php
require ("blackjack.php");

$player = new Blackjack();
$dealer = new Blackjack();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['hitButton'] == 1) {
        $player->hit();
    }

    if ($_POST['hitButton'] == 2) {
        $player->stand($player, $dealer);
    }
    if ($_POST['hitButton'] == 3) {
        $player->surrender();
    }
}




