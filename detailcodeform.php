<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Modif/Suppr Code</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteDetailCode();
		?>
	</head>

	<body >
		<?php 
			include("./inserinto/haut.php");
		?>	
		<div class="container my-2">			
			<?php
				$codeDemande = $_GET['code'];
				if ($result->rowCount() == 0) {
					echo('
					<div class="row mx-2 border border-dark rounded align-self-start">
						&nbsp;Ce document "'.$codeDemande.'" nous est inconnu...
					</div>
					<div class="row m-2 bg-light border border-dark rounded align-self-start">
						<div class="col-4 text-center">
							<a href="listemalles.php">Retour à la liste des malles</a>
						</div> 
						<div class="col-4 text-center">
							<a href="majcodechoix.php">Choisir un autre document</a>
						</div>
						<div class="col-4 text-center">
							<a href="ajoutcodeform.php">Ajouter un document</a>
						</div>
					</div>
					');
				}
			while ($codeBarre = $result->fetch(PDO::FETCH_OBJ)) {
				$code = $codeBarre->CodeBarre;
				$codeSorti = $codeBarre->CodeSorti;
				$dansmalle = $codeBarre->NomMalle;
				if ($codeSorti == "0") {
					$codeSorti = "Non" ;
				}
				elseif ($codeSorti == "1") {
					$codeSorti = "Oui" ;
				}
				else {
					$codeSorti = "Le doc est perdu ?";
				};
				?>
			<h1 class="border text-center border-dark rounded text-dark py-2"">
				Modifier ou supprimer le code "<?= $code ?>"
			</h1>
			<div class="row mx-2 border border-dark rounded align-self-start">
				<table class="table table-hover table-sm">
					<thead>
						<tr>
							<td><b>Code barre</b></td>
							<td><b>Document sorti ?</b></td>
							<td><b>Dans la malle</b></td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>		
						<tr>
							<td class="pl-4"><?= $code ?></td>
							<td class="pl-4"><?= $codeSorti ?></td>
							<td class="pl-4"><?= $dansmalle ?></td>
							<td>
								<?= '<a class="btn btn-outline-dark" href="majcodeform.php?code='. $code .'" >Modifier</a>'?>
							</td>
							<td>
								<?= '<a class="btn btn-outline-dark" href="supprcodeform.php?code='. $code .'" >Supprimer</a>';?>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class="row m-2 bg-light border border-dark rounded align-self-start">
				<div class="col-4 text-center">
					<a href="listemalles.php">Retour à la liste des malles</a>
				</div> 
				<div class="col-4 text-center">
					<a href="majcodechoix.php">Choisir un autre document</a>
				</div>
				<div class="col-4 text-center">
				<?php 
					}
					$result->closeCursor();
				?>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>