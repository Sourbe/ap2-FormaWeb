<h1>Mon profil</h1>
<br />
<table>
    <tr>
        <td>Nom : <?= $util["NOMS"] ?></td>
        <td>Prénom : <?= $util["PRENOMS"] ?></td>
        <td>Association : <?= $util["NOMAS"] ?></td>
    </tr>
    <tr>
        <td>Adresse : <?= $util["ADRESSES"] ?></td>
        <td>Code postal : <?= $util["CPS"] ?></td>
        <td>Ville : <?= $util["VILLES"] ?></td>
    </tr>
    <tr>
        <td>Statut : <?= $util["STATUTS"] ?></td>
        <td>Fonction : <?= $util["FONCTIONS"] ?></td>
    </tr>
</table>
<br/>
<br/>
<br/>
<a href="./?action=deconnexion">se deconnecter</a>
