<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
        <body style="background-color: #1fef;">
        
       <?php


         $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
         mysqli_select_db ($connect,'trotinette');
 $numT_rep = $_POST["numT_rep"];


try
{
  $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD', 'trotinette2019');
}
catch(Exception $a)
{
        die('Erreur : '.$a->getMessage());
}  
/*********************************************************************/
//mise a jour la table trotinette(modifier l'état de marche de la trotinette)

$test = $db->query('update trotinette set trotinette.etat_marche = "fonction" where trotinette.etat_marche="enpanne" and trotinette.num_trot='.$numT_rep );

/**********************************************************************/


echo"<h4>la trottinette numero $numT_rep est repare avec succes !</br></br> </br></h4>";
echo"<h2><center>Merci!</center></br></h2>";
  
$test->closeCursor();

       

       
       ?>
    </p>
   <p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
    
    
    </body>
</html>
 