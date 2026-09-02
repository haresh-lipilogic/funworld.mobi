<?php
$con2=mysqli_connect('10.125.1.51','webserveruser','K&dN&r4a8N@du0') or die(mysql_error());
$url='https://pub.gamezop.com/v3/games?id=r12Y2MARPW';



$ws=file_get_contents($url);

$ws1=json_decode($ws,true);
//print_r($ws1);
//Array ( [games] => Array ( [0] => Array ( [code] => H1lZem8hq [url] => https://games.gamezop.com/g/H1lZem8hq?id=r12Y2MARPW [name] => Array ( [en] => Juicy Dash ) [isPortrait] => 1 [description] => Array ( [en] => Juicy, tasty, match-3 madness. Prove your skills and match as many fruits as possible. ) [assets] => Array ( [cover] => https://static.gamezop.io/H1lZem8hq/cover.jpg [brick] => https://static.gamezop.io/H1lZem8hq/brick.png [thumb] => https://static.gamezop.io/H1lZem8hq/thumb.png [wall] => https://static.gamezop.io/H1lZem8hq/wall.png [screens] => Array ( [0] => https://static.gamezop.io/H1lZem8hq/game-1.png [1] => https://static.gamezop.io/H1lZem8hq/game-2.png [2] => https://static.gamezop.io/H1lZem8hq/game-3.png ) [coverTiny] => https://static.gamezop.io/H1lZem8hq/cover-tiny.jpg [brickTiny] => https://static.gamezop.io/H1lZem8hq/brick-tiny.png ) [categories] => Array ( [en] => Array ( [0] => Puzzle & Logic ) ) [tags] => Array ( [en] => Array ( [0] => Logic [1] => Food [2] => Fun [3] => Strategy [4] => Match-3 [5] => Time Mgmt. [6] => Level-based [7] => Cute [8] => Puzzle ) ) [width] => 466 [height] => 600 )


$games2=$ws1['games'];
//print_r($games);


for($i=0;$i<500;$i++)
{
	//echo $i;
	$games=$games2[$i];
	echo "<br> code== ".$code=$games['code'];
	echo "<br> url== ".$url=$games['url'];
	echo "<br> nmae== ".$name=$games['name']['en'];
	echo "<br> portrait== ".$portrait=$games['isPortrait'];
	echo "<br> description== ".$description=$games['description']['en']; 
	echo "<br> cover== ".$cover=$games['assets']['cover']; 
	echo "<br> categories== ".$categories=$games['categories']['en'][0]; 
	echo "<br> width== ".$width=$games['width']; 
	echo "<br> height== ".$height=$games['height']; 
	
	$sql55="INSERT INTO game_database.games
					(`code`, `url`, `name`,`portrait`,`description`,`cover`,`categories`,`width`,`height`) values('".$code."','".$url."','".$name."','".$portrait."','".$description."','".$cover."','".$categories."','".$width."','".$height."')  ";
					
				
					 $result33=mysqli_query($con2,$sql55);
	
//	exit;
	
	
}



?>