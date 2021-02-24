<!DOCTYPE html>
<html>
    <head>

        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>

    <h3><font color="#006400"><center>Merci de rendre la trotinette que vous aves loue </font></center></h3>
    <body style="background-color: #1fef;">
</body>
         <h4>
       <?php
       $db=mysqli_connect ('localhost','projetBDD','trotinette2019');
         mysqli_select_db ($db,'trotinette');
         try
        {
            $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD', 'trotinette2019');
        }
        catch(Exception $a)
        {
            die('Erreur : '.$a->getMessage());
        }
        $loct = $_POST["location_tr"]; 
        $temp_loc = $_POST["durre_loc"]; 
        $prix = 0.1*$temp_loc;

        echo"Prix de location:  $prix EURO <br/> <br/>";

         /*************************************************************/
        //mise a jour la table trotinette(disponibilite)

        $db->query('update trotinette set trotinette.disponibilite = "loue" where  trotinette.disponibilite="quai" and trotinette.num_trot='.$loct);
        
        /**************************************************************/
        //mise a jour du durée location
        /*************************************************************/


        $inst=$db->query('update location set location.duree_loc='.$temp_loc.' where location.num_trot='.$loct);



        /************************************************************/
        echo"Vous avez loué la trotinette numero: $loct   avec sucées</br></br>";
        echo "<br>";
        ?>
        <center>
            <h4>Rendre la trotinette que vous avez loue</h4>
        

<form action="rndr_trot.php" method="post">
</fieldset>
Saisissez numero de station
<br/>
 <input type="text" name="station_rendre" placeholder="Numero station" />
<br/>
Saisissez numero de trotinette
<br/>
<input type="text" name="rendre_trot" placeholder="Numero trotinette" />
<br />
<input type="submit" value="valider" />
</fieldset>
</form>
</center>










    </p>
<p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
        
    </body>
</html>