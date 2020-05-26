<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$pretcode=pretdoc();
$id=$_GET['id'];
header("Location: pretcodeform.php?id=$id");
?>