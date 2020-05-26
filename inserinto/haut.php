<?php
	$cheminComplet = "http://".$_SERVER['SERVER_NAME']."/";
?>
		<div class="container-fluid mt-2">
			<header class="page-header">
				<img src="<?php echo $cheminComplet;?>Malles/inserinto/mallelivres.jpeg" alt="Une malle porte-livres"/>
			</header>

			<nav id="navbar" class="navbar navbar-expand-sm bg-dark border border-muted rounded navbar-dark mt-2"> 
				<!-- Toggler/collapsible Button --> 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> 
					<span class="navbar-toggler-icon"></span> 
				</button> 

				<div class="collapse navbar-collapse" id="collapsibleNavbar"> 
					<ul class="navbar-nav"> 
						<li class="nav-item"> 
							<a class="nav-link" href="<?php echo $cheminComplet;?>Malles/listemalles.php">Catalogue des malles</a> 
						</li> 
						<li class="nav-item"> 
							<a class="nav-link" href="<?php echo $cheminComplet;?>Malles/pretmalle.php">Prêt des malles</a> 
						</li> 
						<li class="nav-item"> 
							<a class="nav-link" href="<?php echo $cheminComplet;?>Malles/retourmalle.php">Retour des malles</a> 
						</li> 
						<li class="nav-item dropdown"> 
							<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="<?php echo $cheminComplet;?>Malles/" role="button" aria-haspopup="true" aria-expanded="false">Gestion</a>
							<div class="dropdown-menu bg-dark border border-muted text-light rounded navbar-dark">
						    	<a class="dropdown-item text-muted" href="<?php echo $cheminComplet;?>Malles/ajoutform.php">Ajouter une malle</a>
						    	<a class="dropdown-item text-muted" href="<?php echo $cheminComplet;?>Malles/ajoutcodeform.php?choixmalle=">Ajouter un document</a>
						    	<a class="dropdown-item text-muted" href="<?php echo $cheminComplet;?>Malles/majmallechoix.php">Modifier / supprimer une malle</a>
						    	<a class="dropdown-item text-muted" href="<?php echo $cheminComplet;?>Malles/majcodechoix.php">Modifier / supprimer un document</a>
						    </div>
						</li>
					</ul> 
				</div> 
			</nav>
		</div>
