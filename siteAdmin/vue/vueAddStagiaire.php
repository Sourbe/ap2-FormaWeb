<br>
<form method="POST" action = "?action=aAddStagiaire">
        
                Login : <input type= "text" name = "loginS" size = 50></input>
                
                <br><br>
                
                Nom : <input type= "text" name = "nomS" size = 50></input>
                
                <br><br>

                Prénom : <input type= "text" name = "prenomS" size = 50></input>
                
                <br><br>

                Mot de passe : <input type= "text" name = "mdpS" size = 50></input>
                
                <br><br>

                Adresse : <input type= "text" name = "adresseS" size = 50></input>
                
                <br><br>

                Code postal : <input type= "text" name = "cpS" size = 50></input>
                
                <br><br>

                Ville : <input type= "text" name = "villeS" size = 50></input>
                
                <br><br>

                Email : <input type= "text" name = "emailS" size = 50></input>
                
                <br><br>

                Statut : <input type= "text" name = "statutS" size = 50></input>
                
                <br><br>

                Fonction : <input type= "text" name = "fonctionS" size = 50></input>
                
                <br><br>

                Association : 
                <select name="assoc" id="assoc">
                    <?php foreach($listAssoc as $assoc){ ?>
                    <option value="<?php echo $assoc["IDAS"] ?>"><?php echo $assoc["NOMAS"] ?></option>
                    <?php } ?>
                </select>

                <br><br>

        <input type="submit" value = "Enregistrer"/>
</form>