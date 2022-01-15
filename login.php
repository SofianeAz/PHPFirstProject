<?php 
    //  if (!isset($_SESSION['LOGGED_USER'])) {
    //         //  session_destroy();
    //          session_unset();
    //         //  session_destroy();
    //   } else {
        // $_SESSION['allow'] = 'no';

       session_start();

?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Login</title>
</head>
<div class="container justify-content-center">
    <ul class="navbar">
            <li class="nav-item">
                <a class="nav-link bg-light" href="register.php">Login or Sign up</a>
            </lI>
    </ul>
    </div>

<body>
    <div id="booty" class="container">
    <div class="container"> 
        <h3>Veuillez vous connectez</h3>
        <br/>
</div>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Email address</label>
                <!-- mail input -->
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
                <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <!-- password input -->
                <input type="password" class="form-control" id="pwd" name="password" placeholder="Password">
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
        </form>

        <?php

        // $user = "utilParcAuto";
        // $password = "parcAutoUtil";
        


    // enregistrement de l'username en session
        if (isset($_POST['username']) && isset($_POST['password'])) { 
            include "modules/classCon.php";
            include "modules/ClassUser.php";
            $user = $_POST['username'];
            $password = $_POST['password']; 
            
            $check = new User(); 
            // $check->connect('root', '');
            // if ($user === $_POST["username"] && $password === $_POST["password"]) {
            if ($check->checkName($user)) {
                // && $check->checkPassword($user, $password)
                        // if($check->checkPassword($password)){
                        $_SESSION['LOGGED_USER'] = $_POST['username'];
                        $_SESSION['password'] = $_POST['password'];
                        $_SESSION['allow'] = 'yes';
                        // $cookie_name = $user;
                        // $cookie_value = $password;
                        // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 864 = 1 day

                        header("Location: index.php");
                    //}    // sinon avertissement                 
            } else {                        
                        print "<h4>WRONG USER EMAIL OR PASSWORD</h4>";
                    }
            }  
            
            
            // $check->checkPassword($user, $password);
        ?>


    </div>
    </div>
</body>

<script language="javascript">
    document.getElementById('username').value = <?php echo '';?>;
    document.getElementById('password').value = <?php echo '';?>;
</script>

</html>