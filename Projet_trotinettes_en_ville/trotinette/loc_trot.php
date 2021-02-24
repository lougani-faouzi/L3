<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
     

        <h3><font color="deeppink"><center>Bienvenue dans votre espace location</font></center></h3>
         <h4>
           
  <body style="background-color: #1fef;">
</body>
       <?php
 	
       //on se connecte à la base de donnes 

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

$sta = $_POST["nm_s"];

/***********************************************************************************/
//lister les trotinettes a louer
$test = $db->query('SELECT trotinette.num_trot from station ,contient,trotinette where station.num_station ='.$sta. ' and station.num_station=contient.num_station and contient.num_trot = trotinette.num_trot and trotinette.disponibilite = "quai" and trotinette.etat_marche="fonction"');
/***********************************************************************************************/

$var=0;
echo  "Les trotinettes disponibles sont   : <br/>";
while ($st = $test->fetch())
              {
                $var = 1;
      			 echo"<i>Trottinette numero:</i>"; echo  $st['num_trot'] ; echo "<br/>";	             
             
              }
              
               if($var==1)
               {
               	
               		echo "<h4>choisez le numero de trotinette à louer<h4/> ";?>
         	   <form action="trot_gest.php" method="post">
               <input type="text" name="location_tr" /><br />
  
         			<?php echo "choisez le duree en minutes <br/>";?>
         	   <form action="trot_gest.php" method="post">
               <input type="int" name="durre_loc" /><br />
       		    <input type="submit" value="louer" /><br />
    			
         		</form> 
<?php
         	}

            if($var==0) echo"trotinette indisponible<br/>"; 
             

$test->closeCursor();

       
     // mysqli_close();
       
       ?>
    </p>
    <p> <a href="accueil.php">clique ici</a> pour revenir à la page principale.php.</p>
    
    </body>
</html
