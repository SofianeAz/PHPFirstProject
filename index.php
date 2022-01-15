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
// include "data/database.php";


//class code test
include "modules/ClassCon.php";
// include "modules/ClassCar.php";
// include "view/carView.php";
// include "modules/connectClass.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
    <title>PARC AUTO !</title>
</head>
<body>

<?php
    // HEADER
    include "View/header.php";
?>

<div id="booty" class="container">
<?php

    include "view/scriptView.php";

?>

</div>
<?php
    // FOOTER
    include "View/footer.php";
?>


</body>
</html>

