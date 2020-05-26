<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$ajout=ajout();
$ajout->closeCursor();
header("Location: listemalles.php");
?>