<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
        
       <?php


         $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
         mysqli_select_db ($connect,'trotinette');
 $date_e  = $_POST["date_e"];

echo $date_e ;

try
{
  $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD', 'trotinette2019');
}
catch(Exception $a)
{
        die('Erreur : '.$a->getMessage());
}  

/**********************************************/
//Nombre de trotinettes en pannes dans une journnée donner

$test = $db->query('SELECT count(trotinette.num_trot)from contient,trotinette where contient.date_c='.$date_e.' and contient.num_trot = trotinette.num_trot and trotinette.etat_marche = "enpanne"');


/**********************************************/

while ($var = $test->fetch())
{
  echo"<br/>";
  echo"le nombrez de troutinette loue pour la journe ";echo $date_e; echo" est "; echo $var["tmp"];

}

$test->closeCursor();

 ?>      
    </p>
    <p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
    
    </body>
</html>
 
