<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
      <body>
  <body style="background-color: #1fef;">
</body>
      <div class="sta">
<img src="sta.jpg" style="width: 650px;" align="right" />
    <p>
        
       <?php
        
          $num_client = $_POST["num_client"]; 
          $mdpss_client = $_POST["mdpss_client"];
      
         $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
         mysqli_select_db ($connect,'trotinette');
        
try
{
  $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD', 'trotinette2019');
}
catch(Exception $a)
{
        die('Erreur : '.$a->getMessage());
}
//connecter client
$var = $db->query('SELECT num_client, mot_de_passe_c FROM client');
$v3 = 0;
$v4=0;
if($num_client =='' || $mdpss_client=='') {$v4 = 1;echo("erreur de saisie");}
while ($donnees = $var->fetch())
{
  $v1 = $donnees['num_client'];
  $v2 = $donnees['mot_de_passe_c'];
  
  if($v1 == $num_client && $v2 ==$mdpss_client) $v3 = 1;
  
}
if($v3==1 ) {

              echo"<h3><center>Bienvenue dans votre compte</center></h3>";
              echo "<h4><center>Numéro clinet:  $num_client</center></h4> ";
              //affichage des stations qui ont des trotinettes
              /*******************************************************************************/
              $var = $db->query('select station.num_station,station.adresse_s, station.nom_s from trotinette,contient,station where trotinette.disponibilite="quai" and trotinette.etat_marche="fonction" and trotinette.num_trot=contient.num_trot and contient.num_station=station.num_station');
              /*******************************************************************************************/
              echo"<h4 ><big><i>Les stations qui ont des trotinette à loue</i></big></h4>";



              while ($donnees = $var->fetch())
              { 
                echo  "<h4>Numero station :"; echo  $donnees['num_station'].'</br>' ;
               echo  "Nom station: "; echo $donnees['nom_s'].'</br>' ;
               echo  "Adresse :";  echo $donnees['adresse_s'].'</br>' ;

              }
              ?>

              <form action="loc_trot.php" method="post" action="">
            <h3 style="color:red;"><b><big>Entrez lenuméro de station que vous avez choisi</big></b></h3>
      <p>
         Num station  : <input type="text" name="nm_s"/>
       

        <input type="submit" value="Entrez" /><br />
    </p>
          </form>

<?php
   }
elseif($v4==0) echo"compte n'existe pas";

$var->closeCursor();

       
    
       
       ?>
    </p>
    <p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
    
    </body>
</html>
 
