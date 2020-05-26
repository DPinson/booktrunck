<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$ret=retourmalle();
header("Location: retourmalle.php");
?>