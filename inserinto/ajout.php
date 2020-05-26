<?php 
function ajout() {
	$db=connDB();
	$nomMalle=htmlspecialchars($_POST['nomMalle']);
	$couleur=htmlspecialchars($_POST['couleur']);
	if (isset($_POST['sortie'])) {
		$sortie = $_POST['sortie'];
	} else {
		$sortie = "0";
	}

	$requeteAjout = "INSERT INTO  malle(IDMalle, MalleSortie, NomMalle, CouleurMalle) VALUES ('',:sortie,:nommalle,:couleur)";
	$result = $db->prepare($requeteAjout);
	$result->bindParam('sortie',$sortie);
	$result->bindParam('nommalle',$nomMalle);
	$result->bindParam('couleur',$couleur);

	$result->execute();
	return $result;
}

function ajoutcode() {
	$db=connDB();
	$nomMalle=htmlspecialchars($_POST['dansMalle']);
	$code=htmlspecialchars($_POST['code']);
	if (isset($_POST['codeSorti'])) {
		$sorti = $_POST['codeSorti'];
	} else {
		$sorti = "0";
	}

	$requeteAjoutCode = "INSERT INTO  codebarre(CodeBarre, CodeSorti, IDMalle) VALUES (:code,:sorti,:malle)";
	$result = $db->prepare($requeteAjoutCode);
	$result->bindParam('code',$code);
	$result->bindParam('sorti',$sorti);
	$result->bindParam('malle',$nomMalle);
	
	$result->execute();
	return $result;
}
