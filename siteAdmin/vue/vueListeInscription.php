<h1>Liste des inscription : </h1>
<table >
            <tr>
                <th width = 100px>Nom</th>
                <th width = 400px>Formation</th>
                <th width = 100px>Date</th>    

            </tr>
<?php

//si aucun participant n'est inscrit à une formation, on affiche un message
if (empty($listeParticiper)) {
    echo "Aucun participant n'est inscrit à une formation";
} else {
    //sinon on affiche la liste des participants

    foreach ($listeParticiper as $participer) {
        ?>
        
            <tr>
                <td width = 100px><?php echo $participer["NOMS"] ?></td>
                <td width = 400px><?php echo $participer["NOMF"] ?></td>
                <td width = 100px><?php echo $participer["DATES"] ?></td>  
                <?php if ($participer["DATES"] > date("Y-m-d")) { ?>
                    <td width = 100px><a href = "?action=supprInscription&idF=<?php echo $participer["IDFORM"] ?>&idS=<?php echo $participer["NUMS"] ?>&idSt=<?php echo $participer["LOGINS"] ?>">désincrire</a></td>
                <?php } ?>
            </tr>
        
    <?php } 
}
    ?>
</table>
<br>  
<a href = "?action=addInsciption">Nouvelle inscription</a>