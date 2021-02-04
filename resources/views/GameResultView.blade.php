<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Game Result</title>
	</head>
	<body>
		<h2>Result</h2>
		<?php
		 echo "Your Result is: ". $game->getResult();
		?>
		<br/>
		<h3>Stats</h3>
		<?php echo "Wins: ".$game->getWin();?>
		<br/>
		<?php echo "Losses: ".$game->getLoss();?>
		<br/>
		<a href="game">Go Again</a>
	</body>
</html>