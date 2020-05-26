<?php
function pretmalle() {
    $db=connDB();

	$id=intval($_POST['id']);

	$requetePret = "UPDATE malle SET MalleSortie='1' WHERE IDMalle = :id";
	$result = $db->prepare($requetePret);
	$result->bindparam('id',$id);
	$result->execute();	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (pretmalle)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}

function pretdoc() {
    $db=connDB();

	$id=intval($_GET['id']);
	$code=intval($_POST['code']);

	$requetePretCode = "UPDATE codebarre SET CodeSorti=1 WHERE CodeBarre = :code AND IDMalle = :id";
	$result = $db->prepare($requetePretCode);
	$result->bindparam('id',$id);
	$result->bindparam('code',$code);
	$result->execute();	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (pretdoc)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}

function pretalldoc() {
    $db=connDB();

	$id=intval($_POST['id']);

	$requetePretCode = "UPDATE codebarre SET CodeSorti=1 WHERE IDMalle = :id";
	$result = $db->prepare($requetePretCode);
	$result->bindparam('id',$id);
	$result->execute();	

	if (!$result) {
		print "PDO::errorInfo():" . "<br />";
		$msg = $db->errorInfo();
		print $msg[2] . "<br />";
		die("Erreur dans la requête ! (pretdoc)<br><a href=\"javascript:history.go(-1)\">BACK</a>");
	}
	return $result;
	
}