<?php

include_once "ClassClient.php";
include_once "ClassFacture.php";
include_once "ClassProduit.php";
include_once "ClassDFacture.php";
include_once "ClassManagerClient.php";

?>


<?php


	//programme principal
	/*$mClient=new Client(1,"Nom","Prenom","adresse","cp","ville","Pays");

	$mClient->affiche();

	$date = new DateTime();
	 
	$mFacture=new Facture(1,$date->format('Y-m-d'),"CB");

	$mFacture->affiche();

	$mProduit=new Produit(1,"Des",10);

	$mProduit->affiche();

	$mQteProduitsFacture=new DFacture(50);

	$mQteProduitsFacture->affiche();*/

	$date = new DateTime();

	$mClient=new Client(1,"Nom","Prenom","adresse","cp","ville","Pays");

	$mProduit=new Produit(1,"Ecran 4k",400);

	//$qteProd1=new DFacture(10);

	$tProduit=new Produit(2,"test",100);

	$cProduit=new Produit(3,"toto",100);

	//$qteProd2=new DFacture(20);

	//$mProduit->addQteProduits($qteProd1,10);

	//$tProduit->addQteProduits($qteProd2,20);

	/*$arrObj=array();
	$arrObj[]=$mProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;
	$arrObj[]=$tProduit;*/

	$mFacture=new Facture(1,$date->format('Y-m-d'),"CB");

//for($i=0;$i<10;$i++){
		
		$mFacture->addProduits($mProduit,10);
	
	//}

	$mFacture2=new Facture(2,$date->format('Y-m-d'),"cheque");
	
	for($i=0;$i<5;$i++){
		
		$mFacture->addProduits($tProduit,20);
	
	}

		$mFacture->addProduits($cProduit,20);

	//$mFacture->affiche();

	$mClient->addFature($mFacture);

	$mClient->addFature($mFacture2);

	$mFacture2->addProduits($cProduit,20);


	$mClient->affiche();

	//Utilisation du Manager
	
	$Client = new Client([
	  "NumClient" => 1,
	  "Nom" => 'Briot',
	  "Prenom" => 'Anthony',
	  "Adresse" => '6 impasse fleckenstein',
	  "CodePostal" => '67500',
	  "Ville" => 'Haguenau',
	  "Pays" => 'France'
	]);

	$db = new PDO('mysql:host=localhost;dbname=facture', 'root', '');
	$manager = new ClientManager($db);
		
	$manager->add($Client);
	
//il reste un soucis de variable, mais je ne trouve pas d'où il vient
//il manque des arguments dans le constructeur de ClassClient.php
//problème de methode dans la function add de ClassManagerClient



















	/*$mClient->addFature($mFacture);

	$mClient->addFature($mFacture2);

	// Affichage des infos factures
  	foreach($mClient->getFactClient() as $valeur) {
 
    	echo $valeur->affiche() ,'<br/>';
  	}
 
	$mClient->affiche(1);*/

	//$mFacture->affiche();



	/*$_collectFacture=array();

	$_collectFacture[]=$mFacture;

	$_collectFacture[]=$mFacture2;

	echo $_collectFacture[0]->getReg();

	echo $_collectFacture[1]->getReg();*/









?>


<!--hydrater un objet
mettre en place une class manager
contient connexion + requetes-->