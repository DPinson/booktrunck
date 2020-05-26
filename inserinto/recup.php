<?php

function requeteLiens () {
	$db=connDB();
	$requeteLiens = "SELECT IDMalle,MalleSortie,NomMalle,CouleurMalle FROM malle ORDER BY IDMalle DESC";
	$result = $db->query($requeteLiens);
	return $result;	
} 

function requetePretMalle () {
	$db=connDB();
	$requetePretMalle = "SELECT IDMalle,MalleSortie,NomMalle,CouleurMalle FROM malle WHERE MalleSortie='0' ORDER BY IDMalle DESC";
	$result = $db->query($requetePretMalle);
	return $result;	
} 

function requeteRetourMalle () {
	$db=connDB();
	$requetePretMalle = "SELECT IDMalle,MalleSortie,NomMalle,CouleurMalle FROM malle WHERE MalleSortie='1' ORDER BY IDMalle DESC";
	$result = $db->query($requetePretMalle);
	return $result;	
} 

function requeteDetail () {
	$db=connDB();
	$id=intval($_GET["id"]); 
	$requeteDetail = "SELECT * FROM codebarre NATURAL JOIN malle WHERE IDMalle=$id ORDER BY CodeSorti DESC" ; 
	$result = $db->query($requeteDetail);
	return $result;
}

function requeteDetailAsc () {
	$db=connDB();
	$id=intval($_GET["id"]); 
	$requeteDetail = "SELECT * FROM codebarre NATURAL JOIN malle WHERE IDMalle=$id ORDER BY CodeSorti ASC" ; 
	$result = $db->query($requeteDetail);
	return $result;
}

function requeteDetailCode () {
	$db=connDB();
	$id=intval($_GET["code"]); 
	$requeteDetail = "SELECT * FROM codebarre NATURAL JOIN malle WHERE CodeBarre=$id" ; 
	$result = $db->query($requeteDetail);
	return $result;
}

function requeteDetailMalle () {
	$db=connDB();
	$id=intval($_GET["id"]); 
	$requeteDetailMalle = "SELECT IDMalle,MalleSortie,NomMalle,CouleurMalle FROM malle WHERE IDMalle=$id" ; 
	$result = $db->query($requeteDetailMalle);
	return $result;
}

function requeteRetourDetail () {
	$db=connDB();
	$id=intval($_GET["id"]); 
	$requeteDetail = "SELECT * FROM codebarre WHERE CodeSorti=0 AND IDMalle=$id" ; 
	$result = $db->query($requeteDetail);
	return $result;
}

function requetePretDetail () {
	$db=connDB();
	$id=intval($_GET["id"]); 
	$requeteDetail = "SELECT * FROM codebarre WHERE CodeSorti=1 AND IDMalle=$id" ; 
	$result = $db->query($requeteDetail);
	return $result;
}

function tableauMalle () {
	$db=connDB();
	$requeteTab = "SELECT IDMalle,MalleSortie,NomMalle,CouleurMalle FROM malle" ;
	$result = $db->query($requeteTab);
	return $result;
}
