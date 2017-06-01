<?php
class ClientManager
{
  private $_db; // Instance de PDO.

  
  
  public function __construct($db)
  {
    $this->setDb($db);
  }
  
  

  public function add(Client $client)
  {
    // Préparation de la requête d'insertion.
    // Assignation des valeurs.
    // Exécution de la requête.
	
	
	
		//Préparation de la requête select pour NumClient=?(ici ? est Numero)
		$req = $this->_db->prepare('INSERT INTO client(Nom,Prenom,Adresse,Ville,CodePostal,Pays)
		VALUES(:Nom,:Prenom,:Adresse,:CodePostal,:Pays');
			
		$req->bindvalue(':Nom',$client->Nom());
		$req->bindvalue(':Prenom',$client->Prenom());
		$req->bindvalue(':Adresse',$client->Adresse());	
		$req->bindvalue(':CodePostal',$client->CodePostal());
		$req->bindvalue(':Ville',$client->CodeVille());
		$req->bindvalue(':Pays',$client->Pays());
		
		$req->execute();
  }
  
  
  

  public function delete(Client $client)
  {
    // Exécute une requête de type DELETE.
	$this->_db->exec('DELETE FROM client WHERE NumClient = '.$client->NumClient());
  }

  
  
  public function get($NumClient)
  {
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Client.
	
	$NumClient = (int) $NumClient;
	
	$req = $this->_db->query('SELECT NumClient, Nom, Prenom, Adresse, CodePostal, Ville, Pays FROM client WHERE NumClient = '.$NumClient);
	
	$donnees = $req->fetch();
	
	return new Client($donnees);
  }

  
  
  
  public function getList()
  {
    // Retourne la liste de tous les clients.
	
    $clients = [];

    $req = $this->_db->query('SELECT NumClient, Nom, Prenom, Adresse, CodePostal, Ville, Pays FROM Client ORDER BY Nom');

    while ($donnees = $req->fetch(PDO::FETCH_ASSOC))
    {
      $clients[] = new Client($donnees);
    }

    return $clients;
  }

  public function update(Client $client)
  {
    // Prépare une requête de type UPDATE.
    // Assignation des valeurs à la requête.
    // Exécution de la requête.
	
	$req = $this->_db->prepare('UPDATE Client SET Nom = :nom, Prenom = :Prenom, Adresse = :Adresse, CodePostal = :CodePostal, Ville = :Ville, Pays = :Pays WHERE NumClient = :NumClient');

    $req->bindValue(':Nom', $Client->Nom(), PDO::PARAM_INT);
    $req->bindValue(':Prenom', $Client->Prenom(), PDO::PARAM_INT);
    $req->bindValue(':Adresse', $Client->Adresse(), PDO::PARAM_INT);
    $req->bindValue(':CodePostal', $Client->CodePostal(), PDO::PARAM_INT);
    $req->bindValue(':Ville', $Client->Ville(), PDO::PARAM_INT);
	$req->bindValue(':Pays', $Client->Pays(), PDO::PARAM_INT);
	$req->bindValue(':NumClient', $Client->NumClient(), PDO::PARAM_INT);

    $req->execute();
  }



 public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}


?>