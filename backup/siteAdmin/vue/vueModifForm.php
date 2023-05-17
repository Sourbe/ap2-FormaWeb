<br/>
<form method="POST" action = "?action=aModifForm&id=<?php echo $idForm ?>">
        <div id=colonne>
                Nom : <input type= "text" name = "nomF" value = "<?php echo $formation['NOMF']?>" size = 50></input>
                
                <br/><br/>
                
                Public : <input type= "text" name = "publicF" value = "<?php echo $formation['PUBLICF'] ?>" size = 50></input>
                
                <h2>Objectifs</h2>
                <input type= "text" name = "objF" value = "<?php echo $formation['OBJECTIFF'] ?>" size = 50></input>
                
                <h2>Session</h2>
                <?php
                for ($i=0; $i < count($listeSessions); $i++) { 
                        ?>
                        <a id="session" href="./?action=detail&id=<?php echo $idForm ?>&nums=<?php echo $listeSessions[$i]['NUMS']?>">
                        <input type="date" name="sessionF" value="<?php echo $listeSessions[$i]['DATES']; //affiche la date?>"></input>
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
                <textarea name = "contenuF" value = "<?php echo $formation['CONTENUF'] ?>" rows = "15" cols = "50"><?php echo $formation['CONTENUF'] ?></textarea>
                <p><b> Tarif : </b><input type= "text" name = "tarifF" value = "<?php echo $formation['COUTF'] ?>" size = 5> €</p>
                <p><b> Lieu : </b><textarea name = "lieuF" value = "<?php echo $formation['LIEUF'] ?>" rows = "2" cols = "50"><?php echo $formation['LIEUF'] ?></textarea></p>
        </div>
        <input type="submit" value = "Enregistrer"/>
</form>