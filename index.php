<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>Malle & Codes Barres - Index</title>
		<?php
			include("./inserinto/haut.php");
		?>
	</head>

    <body>
		<div class="container-fluid my-2">
			<h1 class="bg-light border border-dark rounded text-center text-dark py-2">
                Malles et Codes Barres, une aventure exclusive !
            </h1>
            <div class="mx-2 bg-light border border-dark rounded align-self-start">
				<a class="dropdown-item text-success" href="<?= $cheminComplet;?>Malles/listemalles.php">Tout commence ici...</a>
            </div>
        </div>


		<?php
			include("./inserinto/bas.php");
		?>
	</body>
</html>