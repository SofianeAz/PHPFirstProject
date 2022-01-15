<?php
session_start();
?>


<?php 
// check pour voir si l'utilisateur est authentifié et autorisé  
    
if($_SESSION['allow'] <> 'yes') {
 header("Location: login.php");
} else {
 $_SESSION['allow'] = 'yes';
}

// database connection  ( $db )
include "data/database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <title>PARC AUTO EXO page de l'exo !</title>
</head>
<body>
    <div class="container">
<h1 class="title center"> PAGE DE TEST DE SCRIPTS </H1>
</div>
<?php
    // HEADER
    include "View/header.php";
?>
<div id="booty">
<!-- <div class="container">
    <?php  
    // Liste Vehicules          
    // include "scripts/listeVehicules.php";
    ?>
</div>        
<div class="container">
          <?php  
    // Liste Vehicules par Chauffeur          
    // include "scripts/listeVehiculesChauffeur.php";
          ?>
</div> -->

<div class="container">
    <?php 
    include "scripts/select.php"
    ?>
   
    </div>
</div>



<?php
    // FOOTER
    include "View/footer.php";
?>

</body>
</html>

