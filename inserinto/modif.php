<?php 

function requeteCodeModif() {
	$db=connDB();

	$id=intval($_GET['id']);
	$code=intval($_POST['code']);
	$malle=intval($_POST['malle']);

	$result = $db->prepare("UPDATE codebarre SET CodeBarre=:code,IDMalle=:malle WHERE CodeBarre = ".$id);
	$result->execute(array(
		'code'=>$code,
		'malle'=>$malle
	));	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (requeteCodeModif)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}

function requeteMalleModif() {
	$db=connDB();

	$id=intval($_POST['id']);
	$nommalle=htmlspecialchars($_POST['nomMalle']);
	$couleur=htmlspecialchars($_POST['couleur']);


	$result = $db->prepare("UPDATE malle SET NomMalle=:nom,CouleurMalle=:couleur WHERE IDMalle = ".$id);
	$result->execute(array(
		'nom'=>$nommalle,
		'couleur'=>$couleur
	));	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (requeteMalleModif)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}

