<?php

require "game.php";
?>

<!<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
<p> <?php ?></p>
<form method="post">
    <h1> <?php echo $player->score ?></h1>
    <button type="submit" name="hitButton" value='1' <?php echo $player->disabled ?>>Hit Me!</button>
    <button type="submit" name="hitButton" value='2' <?php echo $player->disabled ?>>Stand</button>
    <button type="submit" name="hitButton" value='3'><?php echo $player->surReplay ?></button>
</form>
</body>
</html>

