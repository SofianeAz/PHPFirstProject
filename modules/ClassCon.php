<?php

class databaseCon
{  
    private $host;
    private $db; 
    private $username;
    private $password;
    private $con;
    private static $instance;

    // public function __Construct($host, $db,$username,$password){
    //     $this->host = 'localhost';
    //     $this->username = 'root';
    //     $this->password = '';
    //     $this->db = 'parc_auto';
    // }
    
    // function de connexion
    private function connect() {  
        $this->host = 'localhost';
        $this->username = 'root';
        $this->password = '';
        $this->db = 'parc_auto';
        try { 
             $con = new PDO('mysql:host='.$this->host.';dbname='.$this->db.';charset=utf8', $this->username, $this->password);
             $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
             $this->con = $con;                 
        } catch(PDOException $e){
            die("Erreur:".$e->getMessage());
        }             
    }
    //static try

    public static function getInstance(){
        if(static::$instance === NULL){
            static::$instance = new databaseCon();
            static::$instance->connect();
        } 
        return static::$instance;        
    }

    
    // function traitant une requète SQL et renvoyant un resultat
    public function querySelect($param){
        $request = $this->con->prepare($param);
        // if($param2){
        //     $request->bindParam(1, $param2, PDO::PARAM_STR, 12);
        // }
		$request->execute();
		return $result = $request->fetchAll();
		// $request->closeCursor();
		// $request=NULL;
	}

    public function prepareQuery($param){
        return $this->con->prepare($param);
    }


    // function d'affichage de la totalité d'une entité par select SQL
    public function showQuery($query) {
            $datas = $this->querySelect($query);            
            echo "<table class='table'>";
            foreach($datas as $dataRows){
                echo "<tr>";                    
                foreach($dataRows as $tableEntries){
                    echo '<td> '.$tableEntries.'</td>';
                }
                echo "</tr>";
            }
            echo "</table>";
    }
    //function d'insertion d'un vehicule par formulaire
    public function insertCar($param){

        var_dump($param);

        $immat = $param['IMMATRICULATION'];
        $essence = (int)strip_tags($param['essence']);
	    $psc = (int)strip_tags($param['puissance']);
	    $places = (int)strip_tags($param['places']);
	    $color = $param['peinture'];
			
			
        $query = $this->con->prepare("INSERT INTO `voiture` (IMMATRICULATION, ESSENCE, PUISSANCE, PLACES, COULEUR)
            VALUES(?, ?, ?, ?, ?)");
              
        $query->bindValue(1, $immat, PDO::PARAM_STR);
		$query->bindValue(2, $essence, PDO::PARAM_STR);
		$query->bindValue(3, $psc, PDO::PARAM_INT);
		$query->bindValue(4, $places, PDO::PARAM_INT);
        $query->bindValue(5, $color, PDO::PARAM_STR);

		$result = $query->execute();

			if ($result === TRUE) {
				echo '<p class="btn-success">SUCCESS, Vehicule enregistré avec succès !</p>';
			}else{
				echo '<p class="btn-warning">Registration failed try again!';
			}
		}
    // function check si l'utilisateur est déjà dans la database
    public function checkName($username){
            $checkIfExist = $this->prepareQuery('SELECT 1 FROM `users` WHERE `username` = ?');
            $checkIfExist->bindValue(1, $param, PDO::PARAM_STR);         
            $checkIfExist->execute();
            return  $checkIfExist->fetchColumn();
    } 
    public function checkPassword($param, $param2){
            // $encryptedPw = password_hash($param, PASSWORD_DEFAULT);
            $checkIfExist = $this->con->prepare("SELECT * FROM `users` WHERE `username` = ?");
            $checkIfExist->bindValue(1, $param, PDO::PARAM_STR); 
            // $encryptedPw,
            $checkIfExist->execute();
            $result = $checkIfExist->fetchAll(PDO::FETCH_ASSOC);
            return password_verify($param2, $result['password']);
    }
    public function registerUser($param1, $param2){
                $encryptedPw = password_hash($param2, PASSWORD_DEFAULT);
                $register = $this->con->prepare('INSERT into `users` (`username`, `password`)
                                          VALUES(?, ?)');
                $register->bindValue(1, $param1, PDO::PARAM_STR);
                $register->bindValue(2, $encryptedPw, PDO::PARAM_STR);                
                $register->execute();
    }

}  

?>

