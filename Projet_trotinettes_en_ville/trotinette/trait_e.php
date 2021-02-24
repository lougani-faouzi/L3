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
       
       $nom_e = $_POST["nom_e"]; 
       $prenom_e = $_POST["prenom_e"];
       $adresse_e = $_POST["adresse_e"];
       $mot_de_passe_e = $_POST["mot_de_passe_e"];
       echo $adresse_e;
     
        $connect=mysqli_connect ('localhost','projetBDD','trotinette2019');
        mysqli_select_db ($connect,'trotinette');
        $tafat = mysqli_query($connect, "INSERT INTO employe(nom_e, prenom_e,adresse_e, mot_de_passe_e) VALUES(  '$nom_e', '$prenom_e','$adresse_e', '$mot_de_passe_e')");//ajouter


       ?>
    </p>
    <p> <a href="accueil.php">clique ici</a> pour revenir à la page d'accueil</p>
    
    </body>
</html>