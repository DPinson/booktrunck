<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$maj=requeteCodeModif();
header("Location: listemalles.php");
?>