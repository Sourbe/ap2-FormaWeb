<?php
session_start();

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/bd.inscription.inc.php";

// recuperation des donnees GET, POST, et SESSION
$idForm = $_POST["idForm"];
$nums = $_POST["idSession"];
$login = $_SESSION["login"];


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
//

DesinscriptionForma($idForm, $nums, $login);

// traitement si necessaire des donnees recuperees
;

// appel du script de vue qui permet de gerer l'affichage des donnees
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>