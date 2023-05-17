<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/connexion.inc.php";
include_once "$racine/modele/bd.formation.inc.php";

// recuperation des donnees GET, POST, et SESSION


// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 

if (isLoggedOn()){
    $login = getLoginLoggedOn();
    $util = getUtilisateurByLogin($login);
    //modifForm();
    // traitement si necessaire des donnees recuperees
    $idForm = $_GET["id"];

    $formation = getFormation($idForm);
    $listeSessions = getSessions($idForm);


    if(isset($_GET["nums"])){
        $nums = $_GET["nums"];
    }

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

    if(isset($_GET["nums"])){
        $currentSession = getSession($idForm, $nums);
    }
    $nomF = "";
    $publicF = "";
    $objectifF = "";
    $contenuF = "";
    $coutF = "";
    $lieuF = "";

    if (isset($_POST["nomF"])){
        $nomF = $_POST["nomF"];
    }

    if (isset($_POST["publicF"])){
        $publicF = $_POST["publicF"];
    }
    
    if (isset($_POST["objF"])){
        $objectifF = $_POST["objF"];
    }
    
    if (isset($_POST["contenuF"])){
        $contenuF = $_POST["contenuF"];
    }

    if (isset($_POST["tarifF"])){
        $coutF = $_POST["tarifF"];
    }

    if (isset($_POST["lieuF"])){
        $lieuF = $_POST["lieuF"];
    }


    // appel du script de vue qui permet de gerer l'affichage des donnees
    $titre = "Liste des formations répertoriés";
    include "$racine/vue/head.php";
    include "$racine/vue/vueModifForm.php";
    include "$racine/vue/pied.php";
}
else{
    header("Location: index.php?action=action=default");
}

?>