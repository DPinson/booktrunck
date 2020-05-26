<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Catalogue</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteLiens();
		?>
	</head>
	<body >	
	<?php include("./inserinto/haut.php");  ?>
		<div class="container-fluid my-2">
			<h1 class="bg-light border border-dark rounded text-center text-dark py-2">
				Les malles thématiques du fonds tournant
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<div>
				<div class="text-center pb-2 container-fluid">
					<h2 class="text-center">Sommaire</h2>
				</div>
					<?php 
					if ($result->rowCount() == 0) {
						echo ('<p class="p-3">Aucune malle n\'est enregistrée... <a class="btn-btn-success" href="ajoutform.php">Ajouter une malle</a> </p>');
					}
					
					?>	
					<table class="table table-hover table-sm"> <!--table-striped-->
						<thead>
							<tr">
								<td><b>Nom de la malle</b></td>
								<td><b>Malle Sortie ?</b></td>
								<td></td>
							</tr>
						</thead>
						<tbody>
						
						<?php 
						while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
							$nommalle = $malle->NomMalle;
							$couleur = $malle->CouleurMalle;
							$sortie = $malle->MalleSortie;
							if ($sortie == "0") {
								$sortie = "Non" ;
							}
							elseif ($sortie == "1") {
								$sortie = "Oui" ;
							}
							else {
								$sortie = "La malle est perdue ?";
							}
							echo ('	<tr style="background-color:'. $couleur .'">
								<td>'.$nommalle.'</td>
								<td>'.$sortie.'</td>
								<td><a class="btn btn-light" href="detailform.php?id='.$malle->IDMalle.'" >Afficher le contenu</a></td>
							</tr>');}
						$result->closeCursor();
						?>
					</table>
				</div>
			</div>
		</div>
		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>