<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$suppression=supprCode();
header("Location: majcodechoix.php");
?>