<?php
function retourmalle() {
    $db=connDB();

	$id=intval($_POST['id']);

	$requeteRetourMalle = "UPDATE malle SET MalleSortie='0' WHERE IDMalle = :id";
	$result = $db->prepare($requeteRetourMalle);
	$result->bindparam('id',$id);
	$result->execute();	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (retourmalle)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}

function retourdoc() {
    $db=connDB();

	$id=intval($_GET['id']);
	$code=intval($_POST['code']);

	$requeteRetourCode = "UPDATE codebarre SET CodeSorti=0 WHERE CodeBarre = :code AND IDMalle = :id";
	$result = $db->prepare($requeteRetourCode);
	$result->bindparam('id',$id);
	$result->bindparam('code',$code);
	$result->execute();	

	return $result;
}