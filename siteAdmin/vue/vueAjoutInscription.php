<h1>Ajouter une inscription</h1>
<form method="GET" action="">  
    <input type="hidden" name="action" value="addInsciption">
    Stagiaire :
    <?php if(isset($_GET['formation'])){ ?>
        <input type="hidden" name="utilisateur" value="<?php echo $_GET['utilisateur'] ?>">
        <?php echo $_GET['utilisateur']; ?>
    <?php } else  {?>
        <select name="utilisateur">
            <br>
            <?php foreach ($utilisateurs as $utilisateur) { ?>
                
                <option value="<?php echo $utilisateur['LOGINS'] ?>"<?php if (isset($_GET['utilisateur']) && $_GET['utilisateur'] == $utilisateur['LOGINS']) { echo "selected";} ?>><?php echo $utilisateur['LOGINS'] ?></option>
            <?php } ?>
        </select>

    <?php } ?>
    <br><br>
    Formations :
    <?php if(isset($_GET['formation'])){ ?>
        <input type="hidden" name="formation" value="<?php echo $_GET['formation'] ?>">
        <?php foreach ($formations as $formation) { 
            if( $formation['IDFORM'] == $_GET['formation']){
                echo $formation['NOMF'];
            }
         } ?>
    <?php } else  {?>
    
    <select name="formation" onchange="this.form.submit()">
        <option disabled selected>choisir une formation</option>
        <?php foreach ($formations as $formation) { ?>
            <option value="<?php echo $formation['IDFORM'] ?>"><?php echo $formation['NOMF'] ?></option>
        <?php } ?>
    </select>
    
    <?php } ?>

    <?php if(!empty($sessions)){ ?>
        <br><br>
        Sessions :
        <select name="session">
            <?php foreach ($sessions as $session) { ?>
                <option value="<?php echo $session['NUMS'] ?>"><?php echo $session['DATES'] ?></option>
            <?php } ?>
        </select>
        <br><br>
        <input type="submit" value="Inscrire">
    <?php }
    else if (isset($_GET['formation'])) {
        echo "<br><br>Aucune session disponible pour cette formation";
    } 
    
    if(isset($_GET['session'])){

        echo  "<br><br>";
        addParticipant($_GET['formation'], $_GET['session'], $_GET['utilisateur']);

        
        header('Location: ?action=listeInscr');
    }
    
    ?>

    

</form>