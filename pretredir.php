<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$maj=pretmalle();
$majcode=pretalldoc();
header("Location: listemalles.php");
?>