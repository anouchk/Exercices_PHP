<?php
// les # délimitent le début et la fin de la regex
if(preg_match('#guitare|banjo#', 'J\'aime la guitare.')) {
	echo " Avec #guitare# j'ai trouvé la guitare !" ;
} else {
	echo "<br />j'ai pas trouvé la guitare" ;
}

// $ pour dire qu'on veut le PHP à la fin
if(preg_match('#PHP$#', 'Vive PHP')) {
	echo "<br />Avec $ j'ai trouvé le PHP à la fin !" ;
} else {
	echo "<br />j'ai pas trouvé le PHP à la fin" ;
}

// ^  pour dire qu'on veut Vive au début
if(preg_match('#^Vive#', 'Vive PHP')) {
	echo "<br />Avec ^ j'ai trouvé Vive au début !" ;
} else {
	echo "<br />j'ai pas trouvé Vive au début" ;
}

// [] une de ces lettres au milieu 
if(preg_match('#gr[iao]#', 'La nuit tous les chats sont gris')) {
	echo "<br />Avec [iao] j'ai trouvé des chats gris, gros ou gras !" ;
} else {
	echo "<br />j'ai pas trouvé de chats gris, gros ou gras" ;
}

// on peut travailler aussi sur des intervalles : [a-z]
// Si on veut les minuscules et les majuscules : [a-zA-Z]
// des chiffres : [0-9]
if(preg_match('#h[1-6]#', '<h4>Ceci est un titre</h4>')) {
	echo "<br /> Avec #h[1-6]# j'ai trouvé la balise de titre !" ;
} else {
	echo "<br />j'ai pas trouvé la balise de titre" ;
}

// L'accent circonflexe devant des chiffres dans un array ça fait une négation : [^1-6] veut tout sauf des chiffres de 1 à 6


// ? pour un élément présent une ou zéro fois
if(preg_match('#Ay[ay]?#', 'Ayay')) {
	echo "<br />Avec ? j'ai trouvé le terme Ay suivi du terme 'ay' exprimé une ou zéro fois !" ;
} else {
	echo "<br />j'ai pas trouvé de terme Ay suivi du terme 'ay' exprimé une ou zéro fois" ;
}

// + pour un élément présent une ou plusieurs fois
if(preg_match('#Ay[ay]+#', 'Ayayayayayay')) {
	echo "<br />Avec + j'ai trouvé le terme Ay suivi du terme 'ay' exprimé une ou plusieurs fois !" ;
} else {
	echo "<br />j'ai pas trouvé de terme Ay suivi du terme 'ay' exprimé une ou plusieurs fois" ;
}

// * pour un élément présent zéro, une ou plusieurs fois
if(preg_match('#Ay[ay]*#', 'Ay')) {
	echo "<br />Avec * j'ai trouvé le terme Ay suivi du terme 'ay' exprimé zéro, une ou plusieurs fois !" ;
} else {
	echo "<br />j'ai pas trouvé de terme Ay suivi du terme 'ay' exprimé zéro, une ou plusieurs fois" ;
}

// {} pour un élément présent un nombre déterminé de fois
if(preg_match('#^Ay[ay]{3}$#', 'Ayayayay')) {
	echo "<br />Avec #^Ay[ay]{3}$# j'ai trouvé le terme Ay suivi du terme 'ay' exprimé 3 fois !" ;
} else {
	echo "<br />j'ai pas trouvé de terme Ay suivi du terme 'ay' exprimé 3 fois" ;
}

// {} pour un élément présent un nombre déterminé de fois
if(preg_match('#^[0-9]{3}$#', '345')) {
	echo "<br />Avec #^[0-9]{3}$# j'ai trouvé un nombre à 3 chiffres !" ;
} else {
	echo "<br />j'ai pas trouvé un nombre à 3 chiffres " ;
}

// {X,Y} pour un élément présent un nombre compris entre un minimum X et un maximum Y de fois
if(preg_match('#^[0-9]{3,6}$#', '34588')) {
	echo "<br />Avec #^[0-9]{3,6}$# j'ai trouvé un nombre compris entre 3 et 6 chiffres !" ;
} else {
	echo "<br />j'ai pas trouvé un nombre compris entre 3 et 6 chiffres  " ;
}

// {X,} pour un élément présent au moins X fois
if(preg_match('#^[0-9]{3,}$#', '345880980937598Y5653')) {
	echo "<br />Avec #^[0-9]{3,6}$# j'ai trouvé un nombre d'au moins 3 chiffres !" ;
} else {
	echo "<br />j'ai pas trouvé un nombre un nombre d'au moins 3 chiffres " ;
}


?>