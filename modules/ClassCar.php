<?php

class Car 
{       
	public $assurance;
    public $couleur;
    public $essence;
    public $chauffeur;
    public $matricule;
    public $message;
    public $places;
    public $poids;
    public $puissance;
    public $reservoir; 

	// public function __constructor($matricule){
	// 	// $couleur, $essence, $chauffeur, $matricule, $places, $poids, $puissance, $reservoir, $assurance
    // 	$this->couleur = $couleur;
    // 	$this->essence = $essence;
    // 	$this->chauffeur = $chauffeur;
    // 	$this->matricule = $matricule;    	
    // 	$this->places = $places;
    // 	$this->poids = $poids;
    // 	$this->puissance = $puissance;
    // 	$this->reservoir = $reservoir;
	// 	$this->assurance = $assurance; 
	// 	$this->message = $message;
	// }

	// set
	public function setMatricule($matricule){
		return $this->matricule = $matricule;
	}
	public function setEssence($essence){
		return $this->essence = $essence;
	}      
	public function setPlaces($places){
		return $this->places = $places;
	}
	public function setPuissance($puissance){
		return $this->puissance = $puissance;
	}      
	public function setCouleur($couleur){
		return $this->couleur = $couleur;
	}
	// gets
	public function getMatricule(){
		return $this->matricule;
	}
	public function getEssence(){
		return $this->essence;
	}      
	public function getPlaces(){
		return $this->places;
	}
	public function getPuissance(){
		return $this->puissance;
	}      
	public function getCouleur(){
		return $this->couleur;
	}
	// READ --- impression de la table complète     ////////////////////////////////////////

	public function showCarTable($paramDb){
		// connexion db
		$paramDb = databaseCon::getInstance();
		// preparation de la requete
		$query = $paramDb->prepareQuery('SELECT * FROM VOITURE');
		//execution
		$result = $query->execute();
		$result = $query->fetchAll();
		echo "<table class='table'>";
		echo "<tr>
			<th>Immatriculation</th>
			<th>Couleur</th>
			<th>Puissance</th>
			<th>Places</th>
			<th>Peinture</th>
			<th>Peinture</th>
			<th>Peinture</th>
			<th>Peinture</th>
			<th>Peinture</th>
		</tr>";
		foreach($result as $dataRows){
			echo "<tr>";                    
			foreach($dataRows as $tableEntries){
				echo '<td> '.$tableEntries.'</td>';
			}
			echo "</tr>";
		}
		echo "</table>";
		// var_dump($result);
	}

	public function showCar($paramImmat, $paramDb){
		// connexion db
		$paramDb = databaseCon::getInstance();
		// preparation de la requete
		$query = $paramDb->prepareQuery('SELECT * FROM VOITURE
										WHERE IMMATRICULATION = ?');
		$query->bindValue(1, $paramImmat, PDO::PARAM_STR);
		//execution
		$result = $query->execute();
		$result = $query->fetch();
		echo "<table class='table'>";
		echo "<tr>
			<th>Immatriculation</th>
			<th>Essence</th>
			<th>Puissance</th>
			<th>Places</th>
			<th>Peinture</th>
		</tr>";
		echo "<tr>";
		foreach($result as $dataRows){			
			echo "<td>".$dataRows."</td>";
		}
		echo "</tr>";
		echo "</table>";

	}

	/////// CREATE  -  insertion
	public function insertCar($paramPost, $paramDb){
		// lance la connexion a la DB
		$paramDb = databaseCon::getInstance();
		// preparation de la requete
		$query = $paramDb->prepareQuery("INSERT INTO `voiture` (IMMATRICULATION, ESSENCE, PUISSANCE, PLACES, COULEUR)
          								VALUES(?, ?, ?, ?, ?)");
		// set nos valeurs pour la suite
		$this->setMatricule(strip_tags($paramPost['IMMATRICULATION']));
		$this->setEssence(strip_tags($paramPost['essence']));
		$this->setPuissance(strip_tags($paramPost['puissance']));
		$this->setPlaces(strip_tags($paramPost['places']));
		$this->setCouleur(strip_tags($paramPost['peinture']));

        // $this->essence = (int)strip_tags($paramPost['essence']);
	      
        $query->bindValue(1, $this->getMatricule(), PDO::PARAM_STR);
		$query->bindValue(2, $this->getEssence(), PDO::PARAM_STR);
		$query->bindValue(3, $this->getPuissance(), PDO::PARAM_INT);
		$query->bindValue(4, $this->getPlaces(), PDO::PARAM_INT);
        $query->bindValue(5, $this->getCouleur(), PDO::PARAM_STR);

		$result = $query->execute();

		// if($this->checkMatricule($paramDb, $this->getMatricule())){
		// 	echo '<p id="warning" class="btn-warning"> Le vehicule est déjà enregistré !</p>';
		// } else
		if ($result === TRUE) {
					echo '<p class="btn-success">SUCCESS, Vehicule enregistré avec succès !</p>';
		} else {
				echo '<p class="btn-warning">Registration failed ! Le vehicule est déjà enregistré ou l\'un des champs est mal rempli.</p>';
		}		
	}	
	// UPDATE --- Mise à jour d'un élément dans la table
	public function updateCar($paramImmat, $paramDb){
		//connexion DB
		$paramDb = databaseCon::getInstance();
		// nous allons chercher l'item que nous voulons update
		$this->showCar($paramImmat,$paramDb);

		// soit on crée nos options, soit on fait un post avec toutes les options.
		$this->showUpdateOption();
		// $this->update($paramImmat, $paramPost $paramDb);

	}
	public function showUpdateOption() {
		return include "view/formulaireVoiture"; 

	}
	public function update($paramPost, $paramDb){

		if(isset($paramPost['couleur'])){
				$query = $paramDb->prepareQuery('UPDATE Voiture
												SET COULEUR = ? 
												WHERE IMMATRICULATION= ?');	
				$query->bindValue(1, $paramPost['couleur'], PDO::PARAM_STR);
				$query->bindValue(2, $paramPost['IMMATRICULATION'], PDO::PARAM_STR);
				$query->execute();
				echo '<p class="success"> Votre vehicule a changé de couleur ! </p>';
		}
		if(isset($paramPost['essence'])){
				// and if essence < reservoir...
				$query = $paramDb->prepareQuery('UPDATE Voiture
				SET ESSENCE = ? 
				WHERE IMMATRICULATION= ?');	
				$query->bindValue(1, $paramPost['essence'], PDO::PARAM_INT);
				$query->bindValue(2, $paramPost['IMMATRICULATION'], PDO::PARAM_STR);
				$query->execute();
				echo '<p class="success"> Votre vehicule a fait le plein ! </p>';
		}
		if(isset($paramPost['puissance'])){
			$query = $paramDb->prepareQuery('UPDATE Voiture
											SET PUISSANCE = ? 
											WHERE IMMATRICULATION= ?');	
			$query->bindValue(1, $paramPost['puissance'], PDO::PARAM_INT);
			$query->bindValue(2, $paramPost['IMMATRICULATION'], PDO::PARAM_STR);
			$query->execute();
			echo '<p class="success"> Votre vehicule a changé de puissance ! </p>';
		}
		if(isset($paramPost['places'])){
			$query = $paramDb->prepareQuery('UPDATE Voiture
											SET PLACES = ? 
											WHERE IMMATRICULATION= ?');	
			$query->bindValue(1, $paramPost['places'], PDO::PARAM_INT);
			$query->bindValue(2, $paramPost['IMMATRICULATION'], PDO::PARAM_STR);
			$query->execute();
			echo '<p class="success"> Votre vehicule a changé son nombre de places ! </p>';
		}
		$this->showCar($paramPost['IMMATRICULATION'], $paramDb);

	}

	// DELETE --- Effacement d'un élément dans la table
	public function deleteCar($post, $paramDb) {
			// connexion à la DB
			// $paramDb = databaseCon::getInstance();
			// $immat = strip_tags($post['IMMATRICULATION']);
			$query = $paramDb->prepareQuery("DELETE FROM voiture WHERE IMMATRICULATION = ?");
			$query->bindValue(1, $post['IMMATRICULATION'], PDO::PARAM_STR);

			$result = $query->execute();

			if ($result === TRUE) {
				echo '<p class="btn-success">SUCCESS, Vehicule supprimé avec succès !</p>';
			} else {
				echo '<p class="btn-warning">DELETE FAILED ! Le vehicule n\'a pas été supprimé ou vous avez entré un vehicule qui n\'est pas enregistré.</p>';
			}
	}

	// function check matricule

	public function checkMatricule($paramDb, $param){
		$query = $paramDb->prepareQuery('SELECT * FROM `voiture` WHERE `IMMATRICULATION` = ?');
        $query->bindValue(1, $param, PDO::PARAM_STR);         
        $query->execute();
        return  $query->fetchColumn();
   	} 

}


	// function getReservoir($reservoir){
	// 	return $this->reservoir;
	// }
	// function set_chauffeur($chauffeur){
	// 	return $this->chauffeur = $chauffeur;
	// }  
	// function setReservoir($reservoir){
	// 	return $this->reservoir = $reservoir;
	// }
                
      



?>