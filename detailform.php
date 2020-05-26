<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Contenu Malle</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteDetail();
			$resultat=requeteDetailMalle();
		?>
	</head>

	<body >
		<?php 
			include("./inserinto/haut.php");
		?>	
		<div class="container my-2">
			<?php 
				while ($malle = $resultat->fetch(PDO::FETCH_OBJ)) {
					$numMalle = $malle->IDMalle;
					$nomMalle = $malle->NomMalle;
					$couleur = $malle->CouleurMalle;
					$malleSortie = $malle->MalleSortie;
					if ($malleSortie == "0") {
						$malleSortie = "Non" ;
					}
					elseif ($malleSortie == "1") {
						$malleSortie = "Oui" ;
					}
					else {
						$malleSortie = "La malle est perdue ?";
					}
			?>
			<h1 class="border text-center border-dark rounded text-dark py-2" style="background-color:<?= $couleur ?>">
				Contenu de la malle <?= $nomMalle ?>
			</h1>
			<div class="row mx-2 border border-dark rounded align-self-start">
			<?php 
			}
			
			$resultat->closeCursor();

			if ($result->rowCount() == 0) {
				echo('&nbsp;La malle est vide...');
			}
			?>	
				<table class="table table-hover table-sm">
					<thead>
						<tr>
							<td><b>Code barre</b></td>
							<td><b>Document sorti ?</b></td>
							<td></td>
						</tr>
					</thead>
					<tbody>					
				<?php
				while ($codeBarre = $result->fetch(PDO::FETCH_OBJ)) {
					$code = $codeBarre->CodeBarre;
					$codeSorti = $codeBarre->CodeSorti;
					if ($codeSorti == "0") {
						$codeSorti = "Non" ;
					}
					elseif ($codeSorti == "1") {
						$codeSorti = "Oui" ;
					}
					else {
						$codeSorti = "Le doc est perdu ?";
					}
					$codecheck = $codeBarre->CodeSorti;
					if ($codecheck == "0") {
						$codecheck = "unchecked" ;
					}
					else ($codecheck == "1") {
						$codecheck = "checked"
					};
					
					echo ('	
						<tr>
							<td>'.$code.'</td>
							<td>'.$codeSorti.'</td>
							<td><a class="btn btn-outline-dark" href="detailcodeform.php?code='.$code.'" >Modifier / Supprimer le code</a></td>
						</tr>
							');
						}
					$result->closeCursor();
					?>

					</tbody>
				</table>
			</div>
			<div class="row m-2 bg-light border border-dark rounded align-self-start">
				<div class="col-6 offset-3 text-center">
					<a href="listemalles.php">Retour au catalogue</a>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>