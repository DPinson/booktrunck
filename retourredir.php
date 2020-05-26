<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$retcode=retourdoc();
$id=$_GET['id'];
header("Location: retourcodes.php?id=$id");
?>