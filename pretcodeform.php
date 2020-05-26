<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Vérif avant prêt</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteDetailAsc();
			$resultat=requeteDetailMalle();
			$compteur = requetePretDetail();
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
				Contenu de la malle <?= $nomMalle ?> : <?= $total ?> documents
			</h1>
			<?php 
			if ($diff != 0) {
				echo ('
			<div class="m-2 p-3 border border-dark rounded align-self-start">
				<p>Documents sortis : '.$actuels.' sur '.$total.'</p>
				<form class="row" id="pretcodes" name="pretcodes" action="pretcoderedir.php?id='.$numMalle.'" method="post">
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
			<div class="m-2 p-3 border border-dark rounded align-self-start">
				<form class="m-3" id="pretcodes" name="pretcodes" action="pretredir.php" method="post">
					<p>Tous les documents sont prêtés ! </p>
					<fieldset>
						<div class="form-group row ">
							<div class="col-8">
							<input type="hidden" name="id" id="id" class="form-control" value="'.$numMalle.'"/>
								Voulez-vous prêter la malle ?
							</div>
							<div class="col-3 text-align-center">
								<button type="submit" id="envoi" class="btn btn-success">Prêter la malle</button>
							</div>
						</div>
					</fieldset>
				</form>
			</div>
			');
			}?>
			<div class="row mx-2 border border-dark rounded align-self-start">
			<?php 
			}
			if ($result->rowCount() == 0) {
				echo('&nbsp;La malle est vide...');
			}
			?>	
				<table class="table table-hover table-sm">
					<thead>
						<tr>
							<td><b>Code barre</b></td>
							<td><b>Document sorti ?</b></td>
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
						</tr>
							');
						}
					$result->closeCursor();
					?>

					</tbody>
				</table>
			</div>
			<div class="row m-2 bg-light border border-dark rounded align-self-start">
				<div class="col-4 text-center">
					<a href="listemalles.php">Retour à la liste</a>
				</div> 
				<div class="col-4 text-center">
				<?php
					echo '<a href="majform.php?id='. $numMalle .'" >Modifier</a>'
				?>
				</div>
				<div class="col-4 text-center">
				<?php
					echo '<a href="supprform.php?id='. $numMalle .'" >Supprimer</a>';
				/*}*/
				$resultat->closeCursor();
				?>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>