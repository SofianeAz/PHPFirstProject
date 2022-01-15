<?php
session_start()
?>


<?php
if($_SESSION['allow'] <> 'yes') {
    header("Location: login.php");
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
    <title> TEST ClassCar</title>
</head>
<body>

<?php
    // HEADER
    include "View/header.php";
?>

<div class="container">

<?php 
        include "modules/ClassCon.php";
        include "modules/ClassCar.php";

        $mydb = new databaseCon();
        $mycar = new car();
        $mycar->showCarTable($mydb);
?>

</div>


<?php
    // FOOTER
    include "View/footer.php";
?>


</body>
</html>
