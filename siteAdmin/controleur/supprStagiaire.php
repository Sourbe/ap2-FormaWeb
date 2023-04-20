<?php

include_once "$racine/modele/bd.stagiaire.php";

delStagiaire($_GET["idS"]);

header("location:".  $_SERVER['HTTP_REFERER']); 

?>