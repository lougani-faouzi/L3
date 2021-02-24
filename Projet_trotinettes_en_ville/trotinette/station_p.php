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


try
{
  $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD', 'trotinette2019');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}  
$jrn_dn = date("Y-m-d"); echo$jrn_dn;
/***************************************************************/
//station pleinne
$test = $db->query('SELECT contient.num_station ,count(contient.num_trot)  from contient,station where date_c="'.$jrn_dn.'"and contient.num_station=station.num_station group by contient.num_station having COUNT((contient.num_trot)=station.max_trot)' );

/*****************************************************************************/
while ($var = $test->fetch())
 { 
  echo"<br/>";
 echo"numero  pleinn:";echo $var["num_station"];echo"<br/>";
}

$test->closeCursor();

       

       
       ?>
    </p>
    <p><a href="accueil.php">clique ici</a> Pour revenir à la page d'accueil.php.</p>  
    
    </body>
</html>
 