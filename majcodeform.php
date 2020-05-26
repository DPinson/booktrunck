<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Modifier Document</title>
		<?php
			include("./inserinto/haut.php");
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$recup=requeteDetailCode();
			$tabl=tableauMalle();
		?>
	</head>
	<body>
		<div class="container my-2">
			<h1 class="bg-light border text-center border-dark rounded text-dark py-2">
				Modification d'un document
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<?php
				while ($codeBarre = $recup->fetch(PDO::FETCH_OBJ)) {
					$code = $codeBarre->CodeBarre;
					$codeSorti = $codeBarre->CodeSorti;
					if ($codeSorti == "0") {
						$codeSorti = "Non" ;
					}
					elseif ($codeSorti == "1") {
						$codeSorti = "Oui" ;
					}
					$nomMalle = $codeBarre->NomMalle;
					?>
				<form class="m-3" id="modif" name="modiflien" action="majredircode.php?id=<?= $code?>" method="post">
					<fieldset>
			            <div class="form-group row ">
			            	<input type="hidden" name="id" id="id" value="<?= $id=intval($_GET["id"]); ?>">
			            </div>
						<div class="form-group row ">
							<label for="titre" class="col-2 text-right">Code Barre : </label>
							<div class="col-8">
								<input type="text" name="code" id="code" class="form-control" value="<?= $code; ?>"/>
							</div>
						</div>
						<div class="form-group row ">
							<label for="malle" class="col-2 text-right">Dans la malle : </label>
							<div class="col-8">
								<select name="malle" class="form-control">
								<option value="">Choisir</option>
								<?php 
								while ($tableau = $tabl->fetch(PDO::FETCH_OBJ)) {								
								 	echo '<option value="'.$tableau->IDMalle.'" ';
								 	if ($tableau->NomMalle == $nomMalle) {echo "selected";}
								 	echo '>'.$tableau->NomMalle.'</option>'."\n";	
								}
								?>
								</select>
							</div>
						</div>
						<div class="form-group row ">
							<label for="titre" class="col-2 text-right">Document sorti ? </label>
							<div class="col-8 pl-4">
							<!--	<input type="text" name="sorti" id="sorti" class="form-control" value=""/>--><?= $codeSorti; ?>
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Modifier</button>
							<a href="javascript:history.back()" role="button" class="btn btn-danger">Retour</a>
						</div>
					</fieldset>
				<?php
				}
				$recup->closeCursor();
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