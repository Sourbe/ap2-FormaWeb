<h1>Liste des formations : </h1>

<?php

foreach ($listeFormations as $formation) {
    ?>

    <a id="blockFormation" href="./?action=detail&id=<?php echo $formation['IDFORM'] ?>">
        <h4><?php echo $formation['NOMF'] ?></h4>
        <span class="bordure"></span>
        <p id="objectif"><?php echo $formation['OBJECTIFF'] ?></p>
        <div class="bordure"></div>
        <p><b><?php echo $formation['COUTF'] ?> €</b></p>
    </a>

<?php
} 
?>