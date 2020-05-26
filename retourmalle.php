<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Choix Retour</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteRetourMalle();
		?>
	</head>
	<body >	
	<?php include("./inserinto/haut.php");  ?>
		<div class="container-fluid my-2">
			<h1 class="bg-light border border-dark rounded text-center text-dark py-2">
				Retour des malles
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<div class="text-center pb-2 container-fluid">
					<h2 class="text-center">Sommaire</h2>
				</div>
				<?php 
				if ($result->rowCount() == 0) {
					die ('
				<p class="mx-2 p-3 align-self-start">
					Toutes les malles sont rentrées. <a href="pretmalle.php">Voulez-vous en prêter ?</a>
				</p>
				</div>
			</div>
			<div class="container-fluid text-center my-2">
				<footer class="bg-dark border border-muted rounded text-muted pb-1">
						[Denis Pinson - Pour le Fonds Tournant Amiens Métropole]
				</footer>
			</div>
			<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
		</body>
	</html>');
				}
				?>	
				<table class="table table-hover table-sm text-center"> <!--table-striped-->
					<thead>
						<tr>
							<td><b>Nom de la malle</b></td>
							<td><b>Retour</b></td>
						</tr>
					</thead>
					<tbody>
					
					<?php 
					while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
						$id = $malle->IDMalle;
						$nommalle = $malle->NomMalle;
						$couleur = $malle->CouleurMalle;
						$sortie = $malle->MalleSortie;
						
						echo ('	<form class="m-3" id="'.$id.'" name="retour" action="retourcodes.php?id='.$id.'" method="post">
						<fieldset>
							<tr class="" style="background-color:'. $couleur .'">
								<td id="nomMalle">'.$nommalle.'</td>
								<td>
									<input type="hidden" name="sortie" value="1"><input type="hidden" name="id" value="'. $id.'">
									<button type="submit" name="preter" id="preter" class="btn btn-light">Rentrer la malle</button></a>
								</td>
							</tr>
						</fieldset>
					</form>');}
					$result->closeCursor();
					?>
				</table>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>