<?php

    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/style.css">
        <title> Add a vehicle with class </title>
</head>
<body>
<!-- header -->
<?php include "View/header.php" ?>

<div class="container">
        <form action="" method="POST">

                <!-- IMMATRICULATION -->
                <div class="form-group">
                        <label for="IMMATRICULATION"> Immatriculation </label>
                        <input type="text" class="form-control" name="IMMATRICULATION" required>
                </div>
                <!-- essence -->
                <div class="form-group">
                        <label for="essence"> essence </label>
                        <input type="number" class="form-control" name="essence" step="0.01" required>
                </div>
                <!-- PUISSANCE -->
                <div class="form-group">
                        <label for="puissance"> puissance </label>
                        <input type="number" class="form-control" name="puissance" required>
                </div>

                <!-- PLACES -->
                <div class="form-group">
                        <label for="places"> places </label>
                        <input type="number" class="form-control" name="places" required>
                </div>

                <!-- COULEUR-->
                <div class="form-group">
                        <label for="peinture"> peinture </label>
                        <input type="text" class="form-control" name="peinture" required>
                </div>
                <!-- <div class="form-group">
                        <label for="assure">Êtes vous assuré ?</label>
                        <select name="assure">
                                    <option value="1">OUI</option>
                                    <option value="0">NON</option>
                        </select>
                </div> -->


                    <input id="submit" type="submit" class="btn btn-primary" value="Submit">    
        </form>
</div>
<div class="container">
<?php

if (isset($_POST['IMMATRICULATION']) && isset($_POST['essence']) && isset($_POST['puissance']) && isset($_POST['places']) && isset($_POST['peinture'])) {
        
        include "modules/ClassCon.php";
        include "modules/ClassCar.php";

        // traitement de la requête POST d'insertion
        $mydb = databaseCon::getInstance();
        $mycar = new car();
        $mycar->setMatricule((int)$_POST['IMMATRICULATION']);
        $mycar->insertCar($_POST, $mydb);
        // $insert->insertCar($_POST);

        // verification de l'insertion
        $quer = 'SELECT * FROM VOITURE';
        // $mydb->connect();
        $mydb->showQuery($quer);
}

?>
</div>

</body>

</html>