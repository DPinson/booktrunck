<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Recherche Document</title>
		<?php
			include("./inserinto/haut.php");
		?>
	</head>
	<body>
		<div class="container my-2">
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Rechercher un document
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<form class="m-3" id="modif" name="modiflien" action="detailcodeform.php" method="get">
					<fieldset>
						<div class="form-group row ">
							<label for="code" class="col-2 text-right">Code Barre : </label>
							<div class="col-8">
								<input type="text" name="code" id="code" class="form-control" value=""/>
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" id="envoi" class="btn btn-success">Valider</button>
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