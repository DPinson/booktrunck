<?php

function supprCode() {
    $db=connDB();
	$id=intval($_GET["code"]); 
	$requeteSuppr = "DELETE FROM codebarre WHERE CodeBarre=".$id;
	$result = $db->query($requeteSuppr);
	return $result;
    
}

function supprMalle() {
	$db = connDB();
	$id = intval($_GET["id"]);
	$requeteSuppr = "DELETE FROM malle WHERE IDMalle=".$id;
	$result = $db->query($requeteSuppr);
	return $result;

}