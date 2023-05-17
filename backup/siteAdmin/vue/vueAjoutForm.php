<br/>
<form method="POST" action = "?action=aAjoutForm">
        <div id=colonne>
                Nom : <input type= "text" name = "nomF" value = "" size = 50></input>
                
                <br/><br/>
                
                Public : <input type= "text" name = "publicF" value = "" size = 50></input>
                
                <h2>Objectifs</h2>
                <input type= "text" name = "objF" value = "" size = 50></input>
                
        </div>
        <div id=colonne>
                <h2>Contenu</h2>
                <textarea name = "contenuF" value = ">" rows = "15" cols = "50"></textarea>
                <p><b> Tarif : </b><input type= "text" name = "tarifF" value = "" size = 5> €</p>
                <p><b> Lieu : </b><textarea name = "lieuF" value = "" rows = "2" cols = "50"></textarea></p>
        </div>
        <input type="submit" value = "Enregistrer"/>
</form>