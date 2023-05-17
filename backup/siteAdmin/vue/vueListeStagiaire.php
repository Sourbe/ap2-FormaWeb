<h1>Liste des stagiaires : </h1>

<?php

foreach ($listeStagiaire as $stagiaire) {
    ?>
    <table >
        <tr>
            <td width = 100px><?php echo $stagiaire["NOMS"] ?></td>
            <td width = 100px><?php echo $stagiaire["PRENOMS"] ?></td>
            <td width = 100px><?php echo $stagiaire["EMAILS"] ?></td>
            <td width = 200px><?php echo $stagiaire["NOMAS"] ?></td>
            <td width = 100px><a href = "?action=supprStagiaire&idS=<?php echo $stagiaire["LOGINS"] ?>">Supprimer</a></td>
        </tr>
    </table>
<?php } 
?>
<br/>
<a href = "?action=addStagiaire">Nouveau stagiaire</a>