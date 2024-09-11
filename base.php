<?php  //balise d'ouverture php

$mavariable1 = 'coucou'; // déclaration d'une variable avec le sigle $

$mavariable2 = 'les gens';


// var_dump($mavariable1);  // var_dump() explore la variable à des fins de débug

echo $mavariable1 . ' '. $mavariable2 . '<br />';       // le . sert à concaténer. Pour les espaces soit on le met directment dans la chaine de caractère soit on intègre un espace dans la concaténation.

$dwwm = ['cédric', 'frédéric', 'tonin', 'marie-lise', 'déborah', 'anfaïdine'];

foreach($dwwm as $membre) {      // boucle classique dans le tableau
    echo $membre.'<br />';      // on peut donc faire un echo sur $membre le as$membre permet de préciser que les prénoms sont une ligne d'élément. 
    //nb:le '<br /> sert juste à aller à la ligne entre chaque element du tableau
}

?>  <!-- balise de fermeture de php mais la bonne pratique est de ne pas fermer la balise si le code ne contient que du php-->