<?php

include_once "$racine/modele/bd.participer.php";

removeParticipant($_GET["idF"], $_GET["idS"], $_GET["idSt"]);

header("location:".  $_SERVER['HTTP_REFERER']);

?>