
<nav class="navbar fixed-top">
    
    <ul class="navbar">
        <li class="nav-item">
            <a class="nav-link bg-light" href="index.php">Home</a>
        <!-- <li class="nav-item">
            <a class="nav-link bg-light" href="http://localhost/login.php">Login or Sign up</a> -->
        <li class="btn  btn-outline-primary">
            <a href="secondpage.php">View</a>
        </li>
        <!-- <li class="nav-item">
            <a class="nav-link bg-light" href="http://localhost/select.php">Select Menu</a>
        </li> -->
        <!-- <li class="nav-item"> -->
            <!-- <a class="nav-link bg-light" href="addvehicule.php">Ajoutez un vehicule</a> -->
        <!-- </li> -->
        <li class="nav-item">
            <a class="nav-link bg-light" href="insertByCarClass.php">Ajoutez un vehicule</a>
        </li>
     
        <li class="nav-item">
            <a class="nav-link bg-light" href="updateCar.php">Mettre à jour son vehicule.</a>
        </li>
        <li class="nav-item">
            <a class="nav-link bg-light" href="deleteCar.php">Supprimer son vehicule.</a>
        </li>

        <!-- page test -->
        <li class="nav-item">
            <a class="nav-link bg-light" href="testVehicule.php">Tous les vehicules. (test view)</a>
        </li>
        <!-- user stuff -->
        <li class="nav-item">
            <a class="nav-link bg-light" href="logout.php"> DISCONNECT</a>
        </li>
        <li class="nav-item">
            <a class="nav-link btn-success"> <?php echo "Utilisateur: ".$_SESSION['LOGGED_USER'];?></a>
        </li>
        
    </ul>

</nav>
