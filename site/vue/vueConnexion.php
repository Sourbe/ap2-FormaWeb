<h1>Connexion</h1>
<form action="./?action=connexion" method="POST">

    <input type="text" name="login" placeholder="Email de connexion" /><br />
    <input type="password" name="mdp" placeholder="Mot de passe"  /><br />
    <input type="submit" value = "Envoyer"/>

</form>
<?= $message ?>
