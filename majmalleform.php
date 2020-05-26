<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Modifier Malle</title>
		<?php
			require("inserinto/bibfonc.php");
			$db=connDB();
			$result = requeteDetailMalle();
		?>
	</head>
	<body >	
	<?php include("./inserinto/haut.php");  ?>
		<div class="container-fluid my-2">		
			<?php 
			while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
				$nommalle = $malle->NomMalle;
				$id = $malle->IDMalle;
				$couleur = $malle->CouleurMalle;
				$sortie = $malle->MalleSortie;
				if ($sortie == 0){
					$sortie = "Non";
				}
				elseif ($sortie == 1) {
					$sortie = "Oui";
				}
				else {
					$sortie = "Problème de malle";
				}
			?>
			<h1 class="border border-dark rounded text-center text-dark py-2" style="background-color:<?= $couleur?>">
				Modifier la malle <?= $nommalle ?>
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<form class="m-3" id="modif" name="modiflien" action="majredir.php" method="post">
					<fieldset>
			            <div class="form-group row ">
			            	<input type="hidden" id="id" name="id" value="<?= $id=intval($_GET["id"]); ?>">
			            </div>
						<div class="form-group row ">
							<label for="nomMalle" class="col-2 text-right">Nom de la malle : </label>
							<div class="col-8">
								<input type="text" name="nomMalle" id="nomMalle" class="form-control" value="<?= $nommalle ?>" required/>
							</div>
						</div>
						<div class="form-group row">
							<label for="couleur" class="col-2 text-right">Couleur de la malle : </label>
							<div class="col-8">
								<input type="text" name="couleur" id="couleur" class="form-control" value="<?=$couleur?>" /> 
								<!-- insérer ici le color picker -->
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Modifier</button>
							<a href="javascript:history.back()" role="button" class="btn btn-danger">Retour</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php
				}
				$result->closeCursor();
			include("./inserinto/bas.php");
		?>
	</body>
</html>