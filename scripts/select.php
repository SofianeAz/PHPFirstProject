
<form method="post">
<label class="form-select" for="liste">Faîtes votre choix</label>
<select class="form-select" name="liste" >
                <option selected>Open this select menu</option>
                <option value="vehicules">vehicules</option>
                <option value="chauffeurs">chauffeurs</option>
                <option value="vehicules et chauffeurs">vehicules et chauffeurs</option>
        </select>
    <input type="submit" class="btn btn-primary" value="Submit">    
</form>

<div class="container">
<?php 

    // 
    

     if (isset($_POST['liste'])) {
        // include "data/database.php";
         include "modules/classCon.php";  
         $request = databaseCon::getInstance(); 
        
                 if ($_POST['liste'] === "vehicules") {
                            $request->showQuery('SELECT * FROM VOITURE');                                        
                 } 
                 if($_POST['liste'] === "chauffeurs") {
                            $request->showQuery('SELECT * FROM CHAUFFEUR'); 
                }
                 if($_POST['liste'] === "vehicules et chauffeurs"){
                            $request->showQuery('SELECT * FROM CHAUFFEUR AS CH 
                                                JOIN VOITURE AS VO 
                                                ON VO.IMMATRICULATION = CH.VEHICULE;'
                                                );
                }
                // execReq($request);   
    }         
?>
<?php
// function
// function execReq($param){
//     $param->execute();
//     $result = $param->fetchAll(PDO::FETCH_ASSOC);
//     showData($result);
// }

// function showData($param){
//     echo "<table class='table'>";
//     foreach($param as $paramRows){
//         echo "<tr>";                    
//         foreach($paramRows as $paramEntries){
//             echo '<td> '.$paramEntries.'</td>';
//         }
//         echo "</tr>";
//     }
//     echo "</table>";
// }
// TODO : FIX COMMS
?>

</div>