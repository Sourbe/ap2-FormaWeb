<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";

// creation du menu burger
$menuBurger = array();
$menuBurger[] = Array("url"=>"./?action=connexion","label"=>"Connexion");
$menuBurger[] = Array("url"=>"./?action=inscription","label"=>"Inscription");
$message = "";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["login"]) && isset($_POST["mdp"])){
    $login=$_POST["login"];
    $mdp=$_POST["mdp"];
    $connecte = false;
    if(login($login,$mdp)){
        $connecte = true;
    }
    else{
        $message = "Champs invalides ou utilisateur inexistant";
    }
}
else
{
    $login="";
    $mdp="";
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 


// traitement si necessaire des donnees recuperees




if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
    echo "connecté";
    include "$racine/controleur/profil.php";
}
else{ // l'utilisateur n'est pas connecté, on affiche le formulaire de connexion
    // appel du script de vue 
    echo "pas connecté";
    $titre = "connexion";
    include "$racine/vue/head.php";
    include "$racine/vue/vueConnexion.php";
    include "$racine/vue/pied.php";
}

?>