<?php



ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require "game.php";
?>

<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="bjstyle.css">
    <title>Document</title>
</head>
<body>
<form method="post">
    <button type="submit" name="hitButton" value='1' <?php echo $player->disabled ?>>Hit Me!</button>
    <button type="submit" name="hitButton" value='2' <?php echo $player->disabled ?>>Stand</button>
    <button type="submit" name="hitButton" value='3'><?php echo $player->surReplay ?></button>
    <h2>Player score: <?php echo $player->getScore(); ?></h2>
    <h3> <?php echo "you drew ". $player->drawMsg; ?></h3>
    <img src="images/<?php echo $player->image?>" width="80px" alt="cardImage">
    <h2>Dealer score:
        <?php
        foreach ($dealer->dealArray as $deal): ?>

            <p><?php echo $deal ?></p>
        <?php endforeach; ?>
    </h2>
    <h1><?php echo $player->dealMessage; ?></h1>
</form>
</body>
</html>

