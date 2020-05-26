<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Ajout Malle</title>
		<?php
			include("./inserinto/haut.php");
			require("./inserinto/bibfonc.php");
		?>
	</head>
	<body>
		<div class="container my-2">
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Ajouter une malle
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<form class="m-3" id="modif" name="modiflien" action="ajoutredir.php" method="post">
					<fieldset>
						<div class="form-group row ">
							<label for="nomMalle" class="col-2 text-right">Nom de la malle : </label>
							<div class="col-8">
								<input type="text" name="nomMalle" id="nomMalle" class="form-control" value="" required/>
							</div>
						</div>
						<div class="form-group row ">
							<label for="couleur" class="col-2 text-right">Couleur de la malle : </label>
							<div class="col-8">
								<!-- insérer ici le color picker -->
								<input type="text" name="couleur" id="couleur" class="form-control jscolor" value="#AB28FE" /> 
							</div>
						</div>
						<div class="form-group row ">
							<div class="checkbox col-2 text-right">
								<label>
									<input type="checkbox" name="sortie" value="oui" unchecked> Malle sortie ?
								</label>
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Valider</button>
							<a href="listemalles.php" role="button" class="btn btn-danger">Retour</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>