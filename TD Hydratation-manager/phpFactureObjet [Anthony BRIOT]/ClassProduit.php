<?php


//Classe Produit
class Produit{


	//Données Membres
	private $_NumProduit;
	private $_Des;
	private $_Puht;
	
	

	
	//Fcts Membres
	
	//Hyratation
	public function hydrate(array $donnees)
	{
		if (isset($donnees['NumProduit']))
		{
			$this->setNumProduit($donnees['NumProduit']);
		}
		if (isset($donnees['Des']))
		{
			$this->setDes($donnees['Des']);
		}
		if (isset($donnees['Puht']))
		{
			$this->setPrix($donnees['Puht']);
		}
		if (isset($donnees['Adresse']))
		{
			$this->setAdresse($donnees['Adresse']);
		}
		if (isset($donnees['CodePostal']))
		{
			$this->setCodePostal($donnees['CodePostal']);
		}
		if (isset($donnees['Ville']))
		{
			$this->setVille($donnees['Ville']);
		}
		if (isset($donnees['Pays']))
		{
			$this->setPays($donnees['Pays']);
		}
		
		foreach ($donnees as $key => $value)
		{
		// On récupère le nom du setter correspondant à l'attribut.
		$method = 'set'.ucfirst($key);
				
		// Si le setter correspondant existe.
			if (method_exists($this, $method))
			{
			  // On appelle le setter.
			  $this->$method($value);
			}
		}
	}
	public function __construct($mNum,$mDes,$mPrix){

		//echo "Contructeur <br/>";
		$this->_NumProduit=$mNum;
		$this->_Des=$mDes;
		$this->_Puht=$mPrix;
	
	
	}

	public function __destruct(){
	

	}


	//Mutateurs

	public function getNumProduit(){


		return $this->_NumProduit;
	}

	public function getDes(){


		return $this->_Des;
	}

	public function getPrixHt(){


		return $this->_Puht;
	}

	

	public function setNumProduit($mNum){

		$this->_NumProduit=$mNum;

	}

	public function setDes($mDes){

		$this->_Des=$mDes;

	}

	public function setPrix($mPrixHt){

		$this->_Puht=$mPrixHt;

	}

	

	public function affiche(){

		echo $this->_NumProduit."<br/>";
		echo $this->_Des."<br/>";
		echo $this->_Puht."<br/>";
		
	}


	
}




?>