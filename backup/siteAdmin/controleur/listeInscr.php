<?php

include_once "$racine/modele/bd.participer.php";

$listeParticiper = getParticiper();


$titre = "Liste des inscription répertoriés";
include "$racine/vue/head.php";
include "$racine/vue/vueListeInscription.php";
include "$racine/vue/pied.php";
?>