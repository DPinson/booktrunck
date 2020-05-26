<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$suppression=supprMalle();
header("Location: listemalles.php");
?>