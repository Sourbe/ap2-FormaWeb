<?php

include_once "bd.utilisateur.inc.php";

function login($login, $mdp) {
    $champ = false;
    session_start();
    if($login != "" && $mdp != "")
    {
        $util = getUtilisateurByLogin($login);
        $mdpBD = $util["MDPA"];
        echo "util['MDPA']".$util["MDPA"]. $mdp;

        /*if (trim($mdpBD) == trim(crypt($mdp, $mdpBD))) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["login"] = $login;
        $_SESSION["mdp"] = $mdpBD;
        }*/
        if ($mdpBD == $mdp) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
            $_SESSION["login"] = $login;
            $_SESSION["mdp"] = $mdpBD;
            $champ = true;
        }
    }
    return $champ;
}

function logout() {
    if (!isset($_SESSION)) {
        session_start();
    }
    session_unset();
    session_destroy();
}

function getLoginLoggedOn(){
    if (isLoggedOn()){
        $ret = $_SESSION["login"];
    }
    else {
        $ret = "";
    }
    return $ret;
        
}

function isLoggedOn() {
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["login"])) {
        $util = getUtilisateurByLogin($_SESSION["login"]);
        if ($util["LOGINA"] == $_SESSION["login"] && $util["MDPA"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}

if ($_SERVER["SCRIPT_FILENAME"] == __FILE__) {
    // prog principal de test
    header('Content-Type:text/plain');


    // test de connexion
    login("test", "test");
    if (isLoggedOn()) {
        echo "logged";
    } else {
        echo "not logged";
    }

    // deconnexion
    logout();
}
?>