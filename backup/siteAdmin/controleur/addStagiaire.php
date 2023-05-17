<?php

include_once "$racine/modele/bd.association.php";

$listAssoc = getAssoc();

$titre = "Liste des formations répertoriés";
include "$racine/vue/head.php";
include "$racine/vue/vueAddStagiaire.php";
include "$racine/vue/pied.php";

?>