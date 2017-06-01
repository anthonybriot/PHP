
<?php

//classe Client
class Client{


	//Données Membres
	private $_NumClient;
	private $_Nom;
	private $_Prenom;
	private $_Adresse;
	private $_CodePostal;
	private $_Ville;
	private $_Pays;

	
	private $_collectFacture=array();
	

	//Fcts Membres
	
	
	
	public function __construct($mNumClient,$mNom,$mPrenom,$mAdresse,$mCodePostal,$mVille,$mPays){

		//echo "Contructeur <br/>";
		$this->_NumClient=$mNumClient;
		$this->_Nom=$mNom;
		$this->_Prenom=$mPrenom;
		$this->_Adresse=$mAdresse;
		$this->_CodePostal=$mCodePostal;
		$this->_Ville=$mVille;
		$this->_Pays=$mPays;
		

	
	}

	public function __destruct(){

		

	}



	//Mutateurs

	public function getNumClient(){


		return $this->_NumClient;
	}

	public function getNom(){


		return $this->_Nom;
	}

	public function getPrenom(){


		return $this->_Prenom;
	}

	public function getAdresse(){


		return $this->_Adresse;
	}

	public function getCodePostal(){

		return $this->_CodePostal;
	}


	public function getVille(){

		return $this->_Ville;

	}

	public function getPays(){

		return $this->_Pays;

	}

	public function setNumClient($mNumClient){

		$this->_NumClient=$mNumClient;

	}

	public function setNom($mNom){

		$this->_Nom=$mNom;

	}

	public function setPrenom($mNom){

		$this->_Prenom=$mPrenom;

	}

	public function setAdresse($mAdresse){

		$this->_Adresse=$mAdresse;

	}

	public function setCodePostal($mCodePostal){

		$this->_CodePostal=$mCodePostal;

	}

	public function setVille($mVille){

		$this->_Ville=$mVille;

	}

	public function setPays($mPays){

		$this->_Pays=$mPays;

	}
	
	//Hyratation
	public function hydrate(array $donnees)
	{
		if (isset($donnees['NumClient']))
		{
			$this->setNumClient($donnees['NumClient']);
		}
		if (isset($donnees['Nom']))
		{
			$this->setNom($donnees['Nom']);
		}
		if (isset($donnees['Prenom']))
		{
			$this->setPrenom($donnees['Prenom']);
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

	public function affiche(){

		echo $this->_NumClient."<br/>";
		echo $this->_Nom."<br/>";
		echo $this->_Prenom."<br/>";
		echo $this->_Adresse."<br/>";
		echo $this->_CodePostal."<br/>";
		echo $this->_Ville."<br/>";
		echo $this->_Pays."<br/>";
		//echo $this->_collectFacture[$i]->affiche();"<br/>";

		// Affichage des produits dans la facture
  		foreach(self::getFactClient() as $valeur) {
 
    		echo $valeur->affiche().'<br/>';
    			
  		}

	}



	public function getFactClient(){

		return $this->_collectFacture;

	}

	public function addFature(Facture $mCollection){

		if (!in_array($mCollection,$this->_collectFacture)){
			$mCollection->setClient($this);
			$this->_collectFacture[]=$mCollection;
		}
		
			

	}


	
}


// ?>