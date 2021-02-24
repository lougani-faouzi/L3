<!DOCTYPE >
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
      
          $num_employe = $_POST["num_employe"]; 
          $mdpss_employe = $_POST["mdpss_employe"];
    
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

$req = $db->query('SELECT num_employe, mot_de_passe_e FROM employe');
$v3 = 0;
$v4=0;
if($num_employe =='' || $mdpss_employe=='') {
  $v4 = 1;
  echo("erreur de saisie");}
while ($dons = $req->fetch())
{
  $v1 = $dons['num_employe'];
  $v2 = $dons['mot_de_passe_e'];

  if($v1 == $num_employe && $v2 ==$mdpss_employe)
  {
   $v3 = 1;
  }
  
}
if($v3==1 ) {

              
              echo "Pour lister les informations suivantes:</br><br/>";
              echo "*le nombre de troutinettes loues dans une journée </br>
                    *les numeros des trotinette en pannes dans une journée</br>
                    *le nombre des problemes regles dans une journée</br>
                    *le nombre des problemes non regles dans une journée</br>";




               ?>
<p>
              <fieldset>
              <form action="trot_loue.php" method="post">
              Entrez une date  : <input type="date" name="date_loc"/><br />
              <input type="submit" value="chercher" /><br />
        </fieldset>
          </form>

</p>

          <?php


   }
elseif($v4==0){
 echo"compte invalide";
}
$req->closeCursor();
       
       ?>
    </p>
    <p>Si tu veux changer de prénom, <a href="principale.php">clique ici</a> pour revenir à la page formulaire.php.</p>
    
    </body>
</html>
 
