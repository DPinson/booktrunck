<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Modif/Suppr Malle</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result = requeteLiens();
		?>
	</head>
	<body >	
	<?php include("./inserinto/haut.php");  ?>
		<div class="container-fluid my-2">
			<h1 class="bg-light border border-dark rounded text-center text-dark py-2">
				Modifier ou supprimer une malle
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<div>
				<div class="text-center pb-2 container-fluid">
					<h2 class="text-center">Liste des malles</h2>
				</div>
					<table class="table table-hover table-sm"> <!--table-striped-->
						<thead>
							<tr>
								<td><b>Nom de la malle</b></td>
								<td><b>Malle prêtée ?</b></td>
								<td><b></b></td>
								<td><b></b></td>
							</tr>
						</thead>
						<tbody>
						
						<?php 
						while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
							$nommalle = $malle->NomMalle;
							$id = $malle->IDMalle;
							$couleur = $malle->CouleurMalle;
                            $sortie = $malle->MalleSortie;
                            $suppr = "";
							if ($sortie == 0){
                                $sortie = "Non";
                                $suppr = '<a class="btn btn-light" href="supprmalleform.php?id='.$id.'" >Supprimer la malle</a>';
							}
							elseif ($sortie == 1) {
								$sortie = "Oui";
                                $suppr = '<a class="btn btn-dark disabled" role="button" href="" >Suppression impossible</a>';
							}
							else {
								$sortie = "Problème de malle";
							}
							echo ('<tr style="background-color:'. $couleur .'">
								<td>'.$nommalle.'</td>
								<td>'.$sortie.'</td>
								<td><a class="btn btn-light" href="majmalleform.php?id='.$id.'" >Modifier la malle</a></td>
								<td>'.$suppr.'</td>
							</tr>
							');}
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