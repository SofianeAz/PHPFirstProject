
<form method="post">
<label for="couleur">Faîtes votre choix</label>
<select id="myselect" name="couleur">
        <option value=""></option>
                <option value="noir">Noir</option>
                <option value="rouge">Rouge</option>
                <option value="jaune">Jaune</option>
                <option value="vert">Vert</option>
        </select>
    <input type="submit" class="btn btn-primary" value="Submit">    
</form>

<?php


if (isset($_POST['couleur'])) {
        // traitement de la requete
        $couleur = $_POST['couleur']; 
        $sql;     
        if ($couleur === "noir") {
        $sql = 'SELECT * FROM VOITURE WHERE COULEUR = "noir"';
        }
        if ($couleur === "rouge") {
                $sql = 'SELECT * FROM VOITURE WHERE COULEUR = "rouge"';
        }
        if ($couleur === "jaune") {
                $sql = 'SELECT * FROM VOITURE WHERE COULEUR = "jaune"';
        }
        if ($couleur === "vert") {
                $sql = 'SELECT * FROM VOITURE WHERE COULEUR = "vert"';
        }
        if ($couleur === "") { 
                $sql = 'SELECT * FROM VOITURE';
        }
        // include "modules/ClassCon.php";
        $myquery = databaseCon::getInstance();
        // $myquery = databaseCon::connect('root', '');
        // $myquery->connect('root', '');
        // connect(S_SESSION['username'], S_SESSION['password'],)
        $myquery->showQuery($sql);
        var_dump($myquery);

}
        


?>
<script type="text/javascript">
  document.getElementById('myselect').value = "<?php echo $_POST['couleur'];?>";
</script>
