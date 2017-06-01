<?php


//Classe Facture
class Facture{


	//Données Membres
	private $_NumFacture;
	private $_Date;
	private $_ModeReglement;

	private $_Client;
	private $_CollectProduits=array();//on peut remplacer ces collections collectProduit et QteProduits par une collection de DFacture
	private $_QteProduits=array();
	



	//Fcts Membres

	//Hyratation
	public function hydrate(array $donnees)
	{
		if (isset($donnees['NumFacture']))
		{
			$this->setNumFacture($donnees['NumFacture']);
		}
		if (isset($donnees['Date']))
		{
			$this->setDate($donnees['Date']);
		}
		if (isset($donnees['ModeReglement']))
		{
			$this->setReg($donnees['ModeReglement']);
		}
		if (isset($donnees['Client']))
		{
			$this->setClient($donnees['Client']);
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
	
	public function __construct($mNum,$mDate,$mModeReglement){

		//echo "Contructeur <br/>";
		$this->_NumFacture=$mNum;
		$this->_Date=$mDate;
		$this->_ModeReglement=$mModeReglement;
		
		
	
	}

	public function __destruct(){	

	}

	//Mutateurs
	public function getNumFacture(){


		return $this->_NumFacture;
	}

	public function getDate(){


		return $this->_Date;
	}

	public function getReg(){


		return $this->_ModeReglement;
	}

	

	public function setNumFacture($mNum){

		$this->_NumFacture=$mNum;

	}

	public function setDate($mDate){

		$this->_Date=$mDate;

	}

	public function setReg($mReg){

		$this->_ModeReglement=$mReg;

	}

	public function setClient(Client $mClient){

			 $this->_Client=$mClient;
	}

	
	private function getProduits(){

		return $this->_CollectProduits;

	}


	public function addProduits(Produit $mProd,$Quantite){

		/*if (!in_array($mProd,$this->_CollectProduits)){
			
			$this->_CollectProduits[]=$mProd;
		}*/

		$setDfact=new DFacture();

		//if (!in_array($mProd,$this->_CollectProduits)){
		
			$this->_CollectProduits[]=$mProd;
			$this->_QteProduits[]=$Quantite;

			$setDfact->setProduit($mProd);
			$setDfact->setFact($this);
			$setDfact->setQte($Quantite);
		//}
	}

	public function affiche(){

		echo $this->_NumFacture."<br/>";
		echo $this->_Date."<br/>";
		echo $this->_ModeReglement."<br/>";
		
		// Affichage des produits dans la facture

		foreach(self::getProduits() as $key => $valeur){


				$valeur->affiche();
				echo $this->_QteProduits[$key]."<br/>";				
		}

		

		

		
		
  		/*foreach(self::getProduits() as $key=>$valeur) {
 
    		
    		print_r($valeur);

    		
    		
  		}*/


  		
		
	}

	
}









?>