<?php 
require("./inserinto/bibfonc.php");
$db=connDB();
$ajout=ajoutcode();
$ajout->closeCursor();
header('Location: ajoutcodeform.php?choixmalle='.$_POST["dansMalle"].'');
?>