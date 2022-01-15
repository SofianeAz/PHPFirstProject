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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">
    <title>Delete your car !</title>
</head>
<body>
<?php
    // header
    include "View/header.php";

    include "modules/ClassCar.php";
    include "modules/ClassCon.php";
?>

<div class="container">

<form action="" method="POST">
    <div class="form-group">
        <label for="IMMATRICULATION"> Immatriculation du vehicule que vous souhaitez supprimer </label>
                    <input type="text" class="form-control" name="IMMATRICULATION" required></div>
                    <input type="submit" class="btn btn-warning" value="Supprimer le vehicule <!>">
</form>
<?php
if(isset($_POST['IMMATRICULATION'])){
    $db = databaseCon::getInstance();
    $car = new car();
    $car->deleteCar($_POST, $db);
} 
?>

</div>



<?php
    // FOOTER
    include "View/footer.php";
?>

</body>
</html>
