# Open-Ludum
Bibliothèque de jeux avec HTML5/CSS3/PHP/XML

![alt text](https://raw.githubusercontent.com/JackoboUsagi/Open-Ludum/main/screenshot.png)

Jeux supportés :
- Boutiques numériques ( Steam, Epic Games et GOG )
  - Protocoles : steam:// , com.epicgames.launcher:// et openludum://
- Jeux PC Windows
  - Protocoles : openludum://
- Applications Windows
  - Protocoles : openludum://

La création de la liste des jeux et de leurs informations se fait en éditant le fichier
 
## Comment ajouter un jeu ?

Il faut modifier tout d'abord le fichier XML games.xml pour ajouter votre/vos jeu(x).

- Exemple pour un jeu Steam :
```
	<game>
		<name>Sonic Origins Plus</name>
		<releasedate>23 Juin 2023</releasedate>
		<dev>Sonic Team</dev>
		<edit>SEGA</edit>
		<desc>L'Éclair bleu revient dans une collection enrichie de plusieurs grands classiques de la saga Sonic The Hedgehog - Sonic Origins Plus !
			
              Sonic Origins Plus inclut les quatre titres classiques dans Sonic Origins – Sonic the Hedgehog, Sonic 2, Sonic 3 et Knuckles, et Sonic CD avec des graphismes remastérisés, des personnages bonus, de nouveaux modes, défis, contenu exclusif et plus encore, ainsi que des améliorations importantes.
			
			  Le pack inclut aussi 12 jeux Sonic sortis sur Game Gear, tout le contenu additionnel déjà sorti, Knuckles jouable dans Sonic CD, et pour la toute première fois, Amy Rose en personnage jouable dans Sonic The Hedgehog 1, 2, Sonic 3 et Knuckles et Sonic CD ! Avec plus de contenu que jamais, c'est l'expérience ultime de ces jeux classiques !</desc>
		<files>sonic_origins_plus</files>
		<command>steam://rungameid/1794960</command>
	</game>
```
Le numero ID ( ici 1794960 ) se trouve dans le lien de la page Steam officiel du jeu en question ou en affichant le contenu texte d'un raccourci du jeu en question

- Exemple pour un jeu Epic Games
```
	<game>
		<name>Sonic Colors: Ultimate</name>
		<releasedate>07 Septembre 2021</releasedate>
		<dev>SEGA</dev>
		<edit>SEGA</edit>
		<desc>Rejoignez Sonic dans cette aventure inédite à couper le souffle au sein d'un parc d'attraction interstellaire haut en couleur. Colorez l'univers dans Sonic Colors: Ultimate !

			  L'infâme Dr. Eggman a construit un parc d'attractions interstellaire immense qui abrite des pistes et manèges aussi colorés que déjantés. Malheureusement, il l'alimente en asservissant des aliens capturés, les « Wisps ». Utilisez sur la vitesse de l'éclair de Sonic pour libérer les Wisps et découvrez le secret de leurs pouvoirs extraordinaires tandis que vous explorez six mondes uniques et pittoresques, chacun bourré d'ennemis dangereux et d'obstacles à surmonter.</desc>
		<files>sonic_colors_ultimate</files>
		<command>com.epicgames.launcher://apps/d118f9a27e514d98aa25534afd2f35c7%3A6a541faba45e4027ad81de41005721f2%3Ae5071e19d08c45a6bdda5d92fbd0a03e?action=launch&amp;silent=true</command>
	</game>
```
Le contenu du champ com.epicgames.launcher:// se trouve en affichant le contenu texte d'un raccourci du jeu en question

- Exemple pour un jeu GOG, Jeux et Applications Windows
```
	<game>
		<name>Flashback</name>
		<releasedate>29 Novembre 2018</releasedate>
		<dev>Paul Cuisset</dev>
		<edit>Microids</edit>
		<desc>2142. Après s’être enfuit d’un vaisseau spatial, l’éminent scientifique Conrad, se réveille amnésique sur Titan, un satellite colonisé de la planète Saturne. Ses ennemis et kidnappeurs sont à ses trousses. Il devra trouver son chemin pour rentrer sur Terre, se défendre face aux dangers et démanteler un gigantesque complot extraterrestre qui menace la planète…

              Pour son 25ème anniversaire, redécouvrez ce grand classique maintes fois classé dans les tops 100 des meilleurs jeux de tous les temps ! Il fut l’un des premiers jeux à bénéficier de la technologie de motion capture pour des animations plus réalistes, des décors entièrement réalisés à la main et d’un scénario digne d’un film de science-fiction.</desc>
		<files>flashback</files>
		<command>openludum://L:\GOG Galaxy\Games\Flashback\Flashback.exe</command>
	</game>
```
Pour ajouter le protocole openludum:// , utiliser le fichier openludum_protocol.reg dans l'Editeur du Registre. N'hésitez pas à voir le contenu du fichier si vous êtes curieux.

Pour les 3 cas, la balise <files> permettra de choisir le noms de vos fichiers pour le logo, la bannière, l'image de couverture et le manuel PDF (s'il en existe un) :
Par exemple, pour le jeu Steam dans l'exemple 1, j'ai mis sonic_origins_plus . Donc :
- Une image "games_covers/sonic_origins_plus.jpg" devra être créée/ajoutée par vos soins
- Une image "games_logos/sonic_origins_plus.png" devra être créée/ajoutée par vos soins
- Une image "games_wallpapers/sonic_origins_plus.jpg" devra être créée/ajoutée par vos soins
- Un manuel "games_pdfs/sonic_origins_plus.pdf" pourra être créé/ajouté par vos soins

Puis sur votre serveur, se rendre sur votre page.
Exemple : j'ai mis dans un dossier "jackobo/openludum" sur mon serveur installé sur mon PC, ce qui donne : http://(ADRESSE IP DU SERVEUR)/jackobo/openludum/?id=0
