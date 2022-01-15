<?php
    // session_start();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<link rel="stylesheet" href="css/style.css">
    <title>Sign up for free !</title>
</head>
<body>
     <div class="container">
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">username </label>
            <!-- mail input -->
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                <small id="usernameHelp" class="form-text text-muted">Don't share your username with anyone.</small>
            </div>
            <div class="form-group">
                <label for="password1">Password</label>
            <!-- password1 input -->
                <input type="password1" class="form-control" id="pwd" name="password1" placeholder="Password1" required>
            </div>
            <div class="form-group">
                <label for="password2">Password 2</label>
            <!-- password2 input2 -->
                <input type="password2" class="form-control" id="pwd2" name="password2" placeholder="Password2" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Submit">
     </form>
    
     <?php
        include "scripts/scriptregister.php";
     ?>
    
</body>
</html>