<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Choix du prêt</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requetePretMalle();
		?>
	</head>
	<body >	
	<?php include("./inserinto/haut.php");  ?>
		<div class="container-fluid my-2">
			<h1 class="bg-light border border-dark rounded text-center text-dark py-2">
				Prêter une malle
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<div>
				<div class="text-center pb-2 container-fluid">
					<h2 class="text-center">Sommaire</h2>
				</div>
					<?php 
					if ($result->rowCount() == 0) {
						echo('Aucune malle à prêter...');
					}
					?>	
					<table class="table table-hover table-sm text-center"> <!--table-striped-->
						<thead>
							<tr>
								<td><b>Nom de la malle</b></td>
								<td><b>Prêter</b></td>
								<td><b>Vérifier</b></td>
							</tr>
						</thead>
						<tbody>
						
						<?php 
						while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
							$id = $malle->IDMalle;
							$nommalle = $malle->NomMalle;
							$couleur = $malle->CouleurMalle;
							$sortie = $malle->MalleSortie;
							
							echo ('	<form class="m-3" id="'.$id.'" name="modiflien" action="pretredir.php" method="post" onsubmit="return makesure(\''.$nommalle.'\')">
							<fieldset>
								<tr class="" style="background-color:'. $couleur .'">
									<td id="'.$nommalle.'" name="nom">'.$nommalle.'</td>
									<td>
										<input type="hidden" name="sortie" value="1"><input type="hidden" name="id" value="'. $id.'">
										<button type="submit" name="preter" id="preter" class="btn btn-light">Prêter la malle</button>
									</td>
									<td><a class="btn btn-light" href="pretcodeform.php?id='.$id.'" >Vérifier le contenu</a></td>
								</tr>
							</fieldset>
						</form>');}
						$result->closeCursor();
						?>
					</table>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
		<script>
			function makesure(nom) {
				var preter = document.getElementById(nom);
				var nomMalle =  preter.innerHTML;
				var textSure = "Vraiment prêter la malle " + nomMalle +" ?"
				var makesure = confirm(textSure);
				console.log(nom);
				if (makesure == true) {
					return true;
				}
				else {
					return false;
				}
			}
		</script>
	</body>
</html>