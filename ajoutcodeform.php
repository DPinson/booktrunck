<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Crée Code</title>
		<?php
			include("./inserinto/haut.php");
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$tabl=tableauMalle();
			$choixmalle = "";
			if (null !== (intval($_GET["choixmalle"]))) {
				$choixmalle = intval($_GET["choixmalle"]);
			}
		?>
	</head>
	<body>
		<div class="container my-2">
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Ajouter un document
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<form class="m-3" id="modif" name="modiflien" action="ajoutredircode.php" method="post">
					<fieldset>
						<div class="form-group row ">
							<label for="dansMalle" class="col-2 text-right">Malle : </label>
							<div class="col-8">
								<select name="dansMalle" class="form-control" required>
								<option value="">Choisir</option>
								<?php //inserer boucle while
								while ($tableau = $tabl->fetch(PDO::FETCH_OBJ)) {								
								 	echo '<option value="'.$tableau->IDMalle.'" ';
								 	if ($tableau->IDMalle == $choixmalle) {echo "selected";}
								 	echo '>'.$tableau->NomMalle.'</option>'."\n";	
								}
								?>
								</select>
							</div>
						</div>
						<div class="form-group row ">
							<label for="code" class="col-2 text-right">Code barre : </label>
							<div class="col-8">
								<input type="text" name="code" id="code" class="form-control" value=""  autofocus required/>
							</div>
						</div>
						<div class="form-group row ">
							<div class="checkbox col-2 text-right">
								<label>
									<input type="checkbox" name="codeSorti" value="oui" unchecked> Document sorti ?
								</label>
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Valider</button>
							<a href="listemalles.php" role="button" class="btn btn-danger">Retour</a>
						</div>
					</fieldset>
				<?php 
				$tabl->closeCursor(); 
				?>
				</form>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>