<!doctype HTML>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
		<title>M&CB - Modifier Malle</title>
		<?php
			require("./inserinto/bibfonc.php");
			$db=connDB();
			$recup=requeteDetailMalle();
		?>
	</head>
	<body>
		<?php include("./inserinto/haut.php"); ?>
		<div class="container my-2">
			<?php 
				while ($malle = $recup->fetch(PDO::FETCH_OBJ)) {
					$numMalle = $malle->IDMalle;
					$nomMalle = $malle->NomMalle;
					$couleur = $malle->CouleurMalle;
					$malleSortie = $malle->MalleSortie;
					if ($malleSortie == "0") {
						$malleSortie = "Non" ;
					}
					elseif ($malleSortie == "1") {
						$malleSortie = "Oui" ;
					}
					else {
						$malleSortie = "La malle est perdue ?";
					}
			?>
			<h1 class="border text-center border-dark rounded text-dark py-2" style="background-color:<?= $couleur ?>">
				Contenu de la malle <?= $nomMalle ?>
			</h1>
			<div class="mx-2 bg-light border border-dark rounded align-self-start">
				<form class="m-3" id="modif" name="modiflien" action="majredir.php" method="post">
					<fieldset>
					<!-- transformer en tableau -->
						<div class="form-group row ">
							<label for="nomMalle" class="col-2 text-right">Nom de la malle&nbsp;: </label>
							<div class="col-8">
								<input type="text" name="nomMalle" id="nomMalle" class="form-control" value="<?= $nomMalle?>" required/>
							</div>
						</div>
						<div class="form-group row ">
							<div class="col-2 text-right">
								Ancien nom&nbsp;:
							</div>
							<div class="col-8">
								<div name="anciennom" class="form-control" >
									<?= $nomMalle?>
								</div>
							</div>
						</div>
						<div class="form-group row ">
							<label for="couleur" class="col-2 text-right">Couleur de la malle&nbsp;: </label>
							<div class="col-8">
								<input type="text" name="couleur" id="couleur" class="form-control" value="" /> 
								<!-- insérer ici le color picker -->
								
							</div>
						</div>
						<div class="form-group row ">
							<label for="ancienneCouleur"  class="col-2 text-right">Ancienne couleur&nbsp;: </label>
							<div class="col-8">
								<div name="ancienneCouleur" style="background-color:<?= $couleur ?>" class="form-control" >
									<?= $couleur?>
								</div> 
							</div>
						</div>
						<div class="form-group row ">
							<div class="col-2 text-right">
								Malle sortie&nbsp;?
							</div>
							<div class="col-8 px-1">
								<?= $malleSortie?> 
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Valider</button>
							<a href="detailcodeform.php?id=<?=$numMalle?>" role="button" class="btn btn-danger">Retour</a>
						</div>
					</fieldset>
				</form>
			</div>
		</div>
		<?php
			}
			$recup->closeCursor();
			include("./inserinto/bas.php");
		?>
	</body>
</html>







<!--<script>
									var picker = new CP(document.querySelector('input[name="couleur"]'));
									picker.on("change", function(color) {
										this.source.value = '#' + color;
									});
								</script>
		<script src="inserinto/cp/color-picker.min.js"></script>
			$tabl=tableauMalle();

				$tabl->closeCursor();
			            <div class="form-group row ">
			            	<input type="hidden" name="id" value="<?= $id=intval($_GET["id"]); ?>">
			            </div>
						<div class="form-group row ">
							<label for="titre" class="col-2 text-right">Titre : </label>
							<div class="col-8">
								<input type="text" name="titre" id="titre" class="form-control" value="<?php echo $ma; ?>"/>
							</div>
						</div>
						<div class="form-group row ">
							<label for="webmaster" class="col-2 text-right">Webmestre : </label>
							<div class="col-8">
								<input type="text" name="webmaster" id="webmaster" class="form-control" value="<?php echo $web; ?>" />
							</div>
						</div>
						<div class="form-group row ">
							<label for="descr" class="col-2 text-right">Description : </label>
							<div class="col-8">
								<textarea name="descr" id="descr" class="form-control" rows="2"><?php echo $descr; ?></textarea>
							</div>
						</div>
						<div class="form-group row ">
							<label for="url" class="col-2 text-right">URL : </label>
							<div class="col-8">
								<input type="text" name="url" id="url" class="form-control" value="<?php echo $url; ?>" />
							</div>
						</div>
						<div class="form-group row ">
							<label for="theme" class="col-2 text-right">Thème : </label>
							<div class="col-8">
								<select name="theme" class="form-control">
								<option value="">Choisir</option>
								<?php //inserer boucle while
								while ($tableau = $tabl->fetch(PDO::FETCH_OBJ)) {								
								 	echo '<option value="'.$tableau->theme_id.'" ';
								 	if ($tableau->theme == $themes) {echo "selected";}
								 	echo '>'.$tableau->theme.'</option>'."\n";	
								}
								?>
								</select>
							</div>
						</div>
						<div class="form-group row ">
							<label for="date" class="col-2 text-right">Date : </label>
							<div class="col-8">
								<input type="text" name="date" id="date" class="form-control" value="<?php echo $date; ?>" />
							</div>
						</div>
						<div class="form-group row ">
							<div class="checkbox col-2 text-right">
								<label>
									<input type="checkbox" name="affichage" value="oui" <?php if ($affichage=="oui") {echo "checked";} ?>> Visible
								</label>
							</div>
						</div>
						<div class="col-4 offset-2 text-align-center">
							<button type="submit" name="Envoyer" id="envoi" class="btn btn-success">Valider</button>
							<a href="listemalles.php" role="button" class="btn btn-danger">Retour</a>
						</div>
-->