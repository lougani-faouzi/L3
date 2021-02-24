<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
        <h3><font color="#006400"><center>Merci de rendre la trotinette que vous avez loue !! </font></center></h3>
    <body style="background-color: #1fef;">
</body>
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
        $r_troti = $_POST["rendre_trot"]; 
        $r_statn = $_POST["station_rendre"];
        $temps_j = date("Y-m-d"); 
        
       /************************************************************************************/
       //Modifier la disponibilite de trotinette 
       $req= $db->query('update trotinette set trotinette.disponibilite = "quai" where trotinette.disponibilite="loue" and trotinette.num_trot='.$r_troti);

       /*******************************************************************/
       
       /******************************************************************/
       //mise a jour de la table contient
        $req=$db->query('UPDATE contient SET contient.num_station="'.$r_statn.", contient.date_c=".$temps_j.'" where contient.num_trot='.$r_troti);



        echo"Merci d'avoir rendu la trotinette numero $r_troti ";
        

        ?>
       
        
    </p>
<p><a href="accueil.php">clique ici</a> Pour revenir à la page d'accueil.php.</p>    
    </body>
</html>