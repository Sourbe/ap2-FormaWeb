<div id=colonne>
        <h2><?php echo $formation['NOMF'] ?></h2>
<p id="public"><?php echo $formation['PUBLICF'] ?></p>
        <h2>Objectifs</h2>
        <p id="objectif"><?php echo $formation['OBJECTIFF'] ?></p>
        <h2>Session</h2>
        <p>choisir une date : </p>
        <?php
        for ($i=0; $i < count($listeSessions); $i++) { 
                ?>
                <a id="session" href="./?action=detail&id=<?php echo $idForm ?>&nums=<?php echo $listeSessions[$i]['NUMS']?>" 
                <?php   
                        if(isset($currentSession) && $listeSessions[$i]['NUMS'] == $currentSession['NUMS']){
                                echo 'style="color: #ff2e00;"';
                        }
                ?>
                >
                <?php
                        $mydate = $listeSessions[$i]['DATES'];          
                        $day = substr($mydate, 8, 2);
                        $month = substr($mydate, 5, 2);
                        $year = substr($mydate, 0, 4);
                        $dateStr = "$day/$month/$year";
                 echo $dateStr; 
                 ?>
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
                <?php if(isset($currentSession)) { 
  
                        $mydate =    $currentSession['DATES'];          
                        $day = substr($mydate, 8, 2);
                        $month = substr($mydate, 5, 2);
                        $year = substr($mydate, 0, 4);
                        $dateStr = "$day/$month/$year";
                ?>
                <p><b>Session du : </b><?php echo $dateStr ?></p>
                <p><b> Nombre de places disponible : </b><?php echo $currentSession['NBPLACES']-$NbInscrit['nb']." / ".$currentSession['NBPLACES']?></p>
                <?php } ?>
                <p><b> Au tarif de : </b><?php echo $formation['COUTF'] ?> €</p>
                <p><b> Lieu : </b><?php echo $formation['LIEUF'] ?></p>
                
                
                
        </div>

        <?php if(isset($currentSession)) { ?>
                
                
                

                <?php 

                if(isset($login)){
                        //si on est inscrit à la session, on peut se désinscrire
                        if ($estInscritSession) {?>
                                <form method="POST" action="?action=desinscriptionFormation">
                                        <input type="hidden" name="idForm" value="<?php echo $idForm ?>">
                                        <input type="hidden" name="idSession" value="<?php echo $currentSession['NUMS'] ?>">
                                        <input type="submit" class="button" name="inscription" value="Se désinscrire de la formation"></input> 
                                </form>
                        <?php 
                        }
                        else{
                                //si on est inscrit à la formation, on ne peut pas s'inscrire à une session
                                if ($estInscritFormation) {?>
                                        <form method="POST" action="?action=inscriptionFormation">
                                                <input type="hidden" name="idForm" value="<?php echo $idForm ?>">
                                                <input type="hidden" name="idSession" value="<?php echo $currentSession['NUMS'] ?>">
                                                <input type="submit" class="button" name="inscription" value="Vous êtes déjà inscrit à une session" style="background-color: grey;" disabled></input> 
                                        </form>
                                <?php 
                                }
                                else{
                                        //si le nombre de places est atteint, on ne peut pas s'inscrire
                                        if($currentSession['NBPLACES']-$NbInscrit['nb'] == 0){
                                                ?>
                                                <form method="POST" action="?action=inscriptionFormation">
                                                        <input type="hidden" name="idForm" value="<?php echo $idForm ?>">
                                                        <input type="hidden" name="idSession" value="<?php echo $currentSession['NUMS'] ?>">
                                                        <input type="submit" class="button" name="inscription" value="Plus de places disponibles" style="background-color: grey;"></input> 
                                                </form>
                                                <?php
                                        }
                                        else 
                                        {
                                                ?>
                                                <form method="POST" action="?action=inscriptionFormation">
                                                        <input type="hidden" name="idForm" value="<?php echo $idForm ?>">
                                                        <input type="hidden" name="idSession" value="<?php echo $currentSession['NUMS'] ?>">
                                                        <input type="submit" class="button" name="inscription" value="S'inscrire a la formation"></input> 
                                                </form>
                                                <?php
                                        }
                                } ?>
                                
                                
                        <?php 
                        }                 
                }
                else{
                        ?>
                        <form method="POST" action="?action=connexion">
                                <input type="submit" class="button" name="inscription" value="S'inscrire a la formation"></input> 
                        </form>
                        <?php
                }
        } ?>
</div>

