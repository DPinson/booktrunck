<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$maj=requeteMalleModif();
header("Location: listemalles.php");
?>