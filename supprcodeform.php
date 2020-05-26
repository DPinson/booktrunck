<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Suppr Document</title>
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
				while ($codeBarre = $result->fetch(PDO::FETCH_OBJ)) {
					$code = $codeBarre->CodeBarre;
					$dansmalle = $codeBarre->NomMalle;
			?>
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Suppression d'un document
			</h1>
			<div class="row mx-2 bg-light border border-dark rounded align-self-start">
				<div class="col-12 text-center">
					<h2>Êtes-vous sûr de vouloir supprimer le code barre <?= $code ?> ?</h2>
				</div>
				<table class="table table-hover table-sm">
					<thead>
						<tr>
							<td><b>Code barre</b></td>
							<td><b>Dans la malle</b></td>
							<td></td>
							<td></td>
						</tr>
					</thead>
					<tbody>		
						<tr>
							<form class="m-3" id="supprcode" name="supprcode" action="supprredircode.php?code=<?= $code ?>" method="post">
								<fieldset>
									<td class="pl-4" id="code"><?= $code ?></td>
									<td class="pl-4"><?= $dansmalle ?></td>
									<td>
										<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Supprimer</button>
									</td>
									<td>
										<a href="javascript:history.back()" role="button" class="btn btn-danger">Retour</a>
									</td>
								</fieldset>
							</form>
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