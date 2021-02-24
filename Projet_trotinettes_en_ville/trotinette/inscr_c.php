<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Titre de ma page</title>
    </head>
    <body>
    <p>
      <body style="background-color: #1fef;">
        <h2><center> Vous êtes inscrit avec succès merci !</center></h2>
        
        
       <?php
       
       $nom_c = $_POST["nom_c"]; 
       $prenom_c = $_POST["prenom_c"];
       $adresse_c = $_POST["adresse_c"];
       $mot_de_passe_c = $_POST["mot_de_passe_c"];
       echo $adresse_c;
     
        $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
        mysqli_select_db ($connect,'trotinette');
        $tafat = mysqli_query($connect, "INSERT INTO client(nom_c, prenom_c,adresse_c, mot_de_passe_c) VALUES(  '$nom_c', '$prenom_c','$adresse_c', '$mot_de_passe_c')");//ajouter


       ?>
    </p>
    <p> <a href="inscription_c.php">clique ici</a> pour revenir au formulaire d'inscription</p>
    
    </body>
</html>