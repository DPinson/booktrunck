<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Retour Malle</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db = connDB();
			$result = requeteDetail();
			$resultat = requeteDetailMalle();
			$compteur = requeteRetourDetail();
		?>
	</head>

	<body >
		<?php 
			include("./inserinto/haut.php");
		?>	
		<div class="container my-2">
			<?php 
				$total = $result->rowcount();
				$actuels = $compteur->rowcount();
				$diff = $total-$actuels;
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
				Retour de la malle <?= $nomMalle ?> 
			</h1>
			<?php 
			if ($diff != 0) {
				echo ('
			<div class="m-2 p-3 border border-dark rounded align-self-start">
				<p>Documents rentrés : '.$actuels.' sur '.$total.'</p>
				<form class="row" id="retour" name="retourcodes" action="retourredir.php?id='.$numMalle.'" method="post">
					<fieldset>
						<div class="form-group row ">
							<label for="code" class="col-3 text-right">Code Barre : </label>
							<div class="col-5">
								<input type="text" name="code" id="code" class="form-control" value="" autofocus/>
							</div>
							<div class="col-4 text-align-center">
								<button type="submit" id="envoi" class="btn btn-success">Valider</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>');
			}
			else {
				echo ('
			<div class="mx-2 p-3 border border-dark rounded align-self-start">
				<form class="m-3" id="retour" name="retourcodes" action="retourredirmalle.php" method="post">
					<p>Tous les documents sont rentrés ! </p>
					<fieldset>
						<div class="form-group row ">
							<div class="col-8">
								<input type="hidden" name="id" id="id" class="form-control" value="'.$numMalle.'"/>
								Voulez-vous rentrer la malle ?
							</div>
							<div class="col-3 text-align-center">
								<button type="submit" id="envoi" class="btn btn-success">Rentrer la malle</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>');
			}
			?>
			<div class="row m-2 border border-dark rounded align-self-start">
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
							<td><b>Document rentré ?</b></td>
						</tr>
					</thead>
					<tbody>					
				<?php
				while ($codeBarre = $result->fetch(PDO::FETCH_OBJ)) {
					$code = $codeBarre->CodeBarre;
					$codeRentre = $codeBarre->CodeSorti;
					if ($codeRentre == "0") {
						$codeRentre = "Oui" ;
					}
					elseif ($codeRentre == "1") {
						$codeRentre = "Non" ;
					}
					else {
						$codeRentre = "Le doc est perdu ?";
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
							<td>'.$codeRentre.'</td>
						</tr>
							');
						}
					$result->closeCursor();
					?>

					</tbody>
				</table>
			</div>
			<div class="row m-2 bg-light border border-dark rounded align-self-start">
				<div class="col-4 offset-1 text-center">
					<a href="retoutmalle.php">Autre malle</a>
				</div>
				<div class="col-4 offset-2 text-center">
					<a href="listemalles.php">Aller au catalogue</a>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>