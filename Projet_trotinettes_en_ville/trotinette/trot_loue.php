<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
            <body style="background-color: #1fef;">
</body>
     <div class="emp">
<img src="emp.jpg" style="width: 650px;" align="right" />
      <h1 ><center><b><big> Mon Espace Du Travail </big></b></center></h1>

      <h4>
        
       <?php


         $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
         mysqli_select_db ($connect,'trotinette');
 $date_loc  = $_POST["date_loc"];
echo "<h3><center>Pour la date :$date_loc</center></h3>";

  echo "<h4>";
try
{
  $db = new PDO('mysql:host=localhost;dbname=trotinette;charset=utf8', 'projetBDD','trotinette2019');
}
catch(Exception $a)
{
        die('Erreur : '.$a->getMessage());
}  
/*************************************************************************/
//le nombre de trotinette louée dans une journnée
$test = $db->query('SELECT count(distinct(num_trot)) AS tmp from location where date_loc ="'.$date_loc.'"');


/***************************************************************************/
  echo"<br/>";
  echo"le nombre de troutinettes loue  est :";
while ($var = $test->fetch())
{
 echo $var["tmp"];

}
/********************************************************************************/
//le nombre de troutinette en pannees
$test = $db->query('SELECT count(trotinette.num_trot) as tmp from contient,trotinette where contient.num_trot = trotinette.num_trot and trotinette.etat_marche = "enpanne" and contient.date_c="'.$date_loc.'"');

/******************************************************************/

  echo"<br/>";
  echo"le nombre de troutinette en pannees  est:";
while ($var = $test->fetch())
 { 
 echo $var["tmp"];

}
/***********************************************************************/
// nombre des problemes regles
$test = $db->query('SELECT COUNT(*) AS tmp FROM probleme WHERE probleme.Etat_prob="regle" and probleme.date_prob="'.$date_loc.'"');


/**********************************************************/
  echo"<br/>";
  echo"le nombre des problemes regles   est: ";
while ($var = $test->fetch())
 { 
 echo $var["tmp"];

}

/***********************************************************/
//le nombre des problemes non regles
$test = $db->query('SELECT COUNT(*) AS tmp FROM probleme WHERE probleme.Etat_prob="nonregle" and probleme.date_prob="'.$date_loc.'"');


/***********************************************************/
  echo"<br/>";
  echo"le nombre des problemes non regles est :";
while ($var = $test->fetch())
 { 
 echo $var["tmp"];

}

/***********************************************************/
//les numeros des trotinettes en pannees
$test = $db->query('SELECT trotinette.num_trot,station.nom_s,station.adresse_s from trotinette,contient,station where trotinette.etat_marche="enpanne" and trotinette.num_trot=contient.num_trot and contient.num_station=station.num_station');

/***********************************************************/
  echo"<br/>";
 echo"les numeros des trotinettes en pannees:";
while ($var = $test->fetch())
 { 
  echo"<br/>";
 echo"numero :";echo $var["num_trot"];echo"<br/>";
  echo"nom station :";echo $var["nom_s"]; echo"<br/>";
 echo"adresse station :";echo $var["adresse_s"];echo"<br/>";


}?>
<fieldset>
<form action="trot_rep.php" method="post">
              Entrez le numero de trotinette a reparer   : <input type="text" name="numT_rep"/><br />
              <input type="submit" value="chercher" /><br />
       
          </form>
          </fieldset>
 <?php   
     
$test->closeCursor();

       

       
       ?>
    </p>

    <p><h4>Pour lister les stations pleins  <a href="station_p.php">clique ici</h4></a>.</p>



     <p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
    
    </body>
</html>
 
