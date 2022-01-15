<?php

if (isset($_POST['username']) && isset($_POST['password1']) && isset($_POST['password2'])) {
        // data du formulaire d'inscription
        $username = $_POST['username'];
        $password1 = $_POST['password1'];
        $password2 =  $_POST['password2'];
        // check pour le password en premier lieu
        if ($password1 != $password2){
            echo "please enter the same password";       
        }
        else {

         include_once "modules/classCon.php";
         // function pour check si le nom est deja utilisé

         $reg = new databaseCon::getInstance();
        //  $reg->connect('root', '');
          // Boolean check si l'utilisateur existe déjà                 
        if($reg->checkName($username)){   
                print "Username is already in use, please use try something else.";  
        } 
        else {      
               $reg->registerUser($username, $password1);
                // SUCCESS
                print $username . " is now registered !";

                // header(location: "login.php");
            }
    }
}


?>