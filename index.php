<?php
$str=file_get_contents('games.xml') or die("CRITICAL ERROR : games.xml not found");
$str=str_replace("&silent", "&amp;silent",$str);
file_put_contents('games.xml', $str);
$gameslist = simplexml_load_file("games.xml") or die("CRITICAL ERROR : games.xml not found");

function compareName($a, $b) { return strcmp($a->name, $b->name); }
$orderGamesList = [];
foreach($gameslist->game as $node) $orderGamesList[] = $node;
usort($orderGamesList,'compareName');

if (isset($_GET['id']))
	{
    $idgame = intval($_GET['id']);
    copy("games_wallpapers/".$orderGamesList[$idgame]->files.".jpg","games_wallpapers/selected_game.jpg");
    copy("games_logos/".$orderGamesList[$idgame]->files.".png","games_logos/selected_game.png");
    copy("games_covers/".$orderGamesList[$idgame]->files.".jpg","games_covers/selected_game.jpg");
    $pdf_exists = 0;
    if(file_exists("games_pdfs/".$orderGamesList[$idgame]->files.".pdf"))
		{
		$pdf_exists = 1;
		}
	}
else
    $idgame = -1;

?>

<!DOCTYPE html>
	<html>
		<head>
			<meta charset=”utf-8″>
			<link rel="stylesheet" href="style.css?time=<?php echo microtime(true);?>">
			<title>Open Ludum</title>
		</head>
		<body>
			<div id="gameslist">
<?php
			for ($id = 0; $id < $gameslist->count(); $id++)
				{ 
				if($id==$idgame)
					echo "\t\t\t\t".'<a name="gameid'.$id.'" class="gameid" href="?id='.$id.'&#gameid'.$id.'"><p class="gameid_selected">'.$orderGamesList[$id]->name.'</p></a>'."\n";
				else
					echo "\t\t\t\t".'<a name="gameid'.$id.'" class="gameid" href="?id='.$id.'&#gameid'.$id.'"><p class="gameid">'.$orderGamesList[$id]->name.'</p></a>'."\n";
				}
?>
			</div>
			
			<div id="gamewallpaper"></div>
			<div id="gamelogo"></div>
			<div id="gameinfo_banner_ui"></div>
			<div id="gameinfo">
<?php
				if($idgame>-1)
					{
					echo "\t\t\t\t".'<p class="info">Date de sortie: '.$orderGamesList[$idgame]->releasedate.'<span>____</span>Développement: '.$orderGamesList[$idgame]->dev.'<span>____</span>Edition: '.$orderGamesList[$idgame]->edit.'</p>'."\n";
					if($pdf_exists==1)
						echo "\t\t\t\t".'<p class="menu"><span class="play"><a href="'.$orderGamesList[$idgame]->command.'">JOUER</a></span><span>____</span><span class="pdf"><a href="games_pdfs/selected_game.pdf" target="_blank">MANUEL</a></span></p>'."\n";
					else
						echo "\t\t\t\t".'<p class="menu"><span class="play"><a href="'.$orderGamesList[$idgame]->command.'">JOUER</a></span><span>____</span><span class="pdf"><a href="#">MANUEL</a></span></p>'."\n";
					}
?>
			</div>	
			
			<div id="gamedesc">
<?php
				if($idgame>-1)
					{
					echo "\t\t\t\t".'<p class="desc">'.nl2br(htmlspecialchars($orderGamesList[$idgame]->desc)).'</p>'."\n";
					}
?>			
			</div>
			<div id="gamecover"></div>
			
			<div id="bottomui"></div>

			<div id="about_left">
				<p class="about_left_name">Open Ludum</p>
				<p class="about_left_about">Online Game Library with HTML<span class="html5">5</span>/CSS<span class="css3">3</span>/<span class="php">PHP</span>/<span class="xml">XML</span></p>
			</div>

			<div id="about_right">
				<p class="about_right_name">Created by Jackobo "Akina" Usagi</p>
				<p class="about_right_about"><a class="about" href="https://github.com/JackoboUsagi" target="_blank">Github Profile</a> - <a class="about" href="https://github.com/JackoboUsagi/Open-Ludum" target="_blank">Source Code on Github</a> - Version 2024.03.12</p>
			</div>

		</body>
</html>
