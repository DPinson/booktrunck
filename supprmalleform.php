<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Supprimer Malle</title>
		<?php
			include("./inserinto/haut.php");
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$result=requeteDetailMalle();
			$codes=requeteDetail();
		?>
	</head>
	<body >
		<div class="container my-2">
		<?php $count = $codes->rowcount() ?>
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Suppression d'une malle
			</h1>
			<?php 
			while ($malle = $result->fetch(PDO::FETCH_OBJ)) {
				$id = $malle->IDMalle;
				$nomMalle = $malle->NomMalle;
				$couleur = $malle->CouleurMalle;
			?>
			<div class="row mx-2 bg-light border border-dark rounded align-self-start">
				<div class="col-12 text-center"><h2>Êtes-vous sûr de vouloir supprimer la malle <?= $nomMalle?> ?</h2></div>
				
			</div>
			<?php
			if ($count != 0) {
				echo('
				<div class="row m-2 p-2 border border-dark rounded align-self-start">
					Il y a encore '.$count.' document dans la malle '.$nomMalle.'. Veuillez les supprimer avant de supprimer la malle.
				</div>
				<div class="row m-2 bg-light border border-dark rounded align-self-start">
					<div class="col-4 text-center">
						<a href="listemalles.php">Retour à la liste des malles</a>
					</div> 
					<div class="col-4 text-center">
						<a href="majmallechoix.php">Choisir une autre malle</a>
					</div>
					<div class="col-4 text-center">
					</div>
				</div>
				');
			}
			?>
			<div class="row m-2 bg-light border border-dark rounded align-self-start">
				<div class="col-6 text-center">
					<a href="majmallechoix.php">Annuler et revenir à la liste</a>
				</div>
				<div class="col-6 text-center">
				<?php
					if ($count == 0) {
						echo '<a href="supprredir.php?id='.$id.'" >Supprimer définitivement</a>';
					} else {
						echo '<a href="majcodechoix.php" >Supprimer un document</a>';
					}
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