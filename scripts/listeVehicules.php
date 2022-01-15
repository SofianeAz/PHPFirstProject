<?php


            //
            $allCar = $db->prepare('SELECT * FROM VOITURE');
            $allDrivers = $db->prepare('SELECT * FROM CHAUFFEUR');

            function getData($param){
                // $query = $db->prepare($param)
                $param->execute();
                $result = $param->fetchAll(PDO::FETCH_ASSOC);
                showMeData($result);
            }
        
            function showMeData($param){  
                echo "<table class='table'>";
                foreach($param as $paramRows){
                    echo "<tr>";                    
                    foreach($paramRows as $paramEntries){
                        echo '<td> '.$paramEntries.'</td>';
                    }
                    echo "</tr>";
                }
                echo "</table>";

            }               
            getData($allCar);
?>