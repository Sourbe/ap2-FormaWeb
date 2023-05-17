<a href = "?action=modifForm&id=<?php echo $_GET['id'] ?>">Modifier</a>
<a href="./?action=supprForm&id=<?php echo $_GET['id'] ?>">Supprimer</a>

<br/>

<div id=colonne>
        <h2><?php echo $formation['NOMF'] ?></h2>
<p id="public"><?php echo $formation['PUBLICF'] ?></p>
        <h2>Objectifs</h2>
        <p id="objectif"><?php echo $formation['OBJECTIFF'] ?></p>
        <h2>Session</h2>
        <?php
        for ($i=0; $i < count($listeSessions); $i++) { 
                ?>
                <a id="session" href="./?action=detail&id=<?php echo $idForm ?>&nums=<?php echo $listeSessions[$i]['NUMS']?>">
                <?php echo $listeSessions[$i]['DATES']; ?>
                </a>
                <?php
                if(($i + 1) != count($listeSessions)){
                        ?>  
                        <div class="bordure"></div>
                <?php
                }
                ?>  
                
        <?php
        }
        ?>  
</div>
<div id=colonne>
        <h2>Contenu</h2>
        <p id="public"><?php echo $formation['CONTENUF'] ?></p>
        <div id="block">
                <?php if(isset($currentSession)) { ?>
                <p><b>Session du : </b><?php echo $currentSession['DATES'] ?></p>
                <?php } ?>
                <p><b> Au tarif de : </b><?php echo $formation['COUTF'] ?> €</p>
                <p><b> Lieu : </b><?php echo $formation['LIEUF'] ?></p>
        </div>

        <?php if(isset($currentSession)) { ?>
                <form method="POST" action="">
                        <input type="hidden" name="idForm" value="<?php echo $idForm ?>">
                        <input type="hidden" name="idSession" value="<?php echo $currentSession['NUMS'] ?>">
                        <input type="submit" class="button" name="inscription" value="S'inscrire a la formation"></input> 
                </form>
        <?php } ?>
</div>

