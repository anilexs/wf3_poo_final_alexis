<?php 
require_once "../model/database.php"; 
require_once "../model/contestModel.php"; 
$contestMatch = Contest::contesMatch($_GET['match_id']);
var_dump($contestMatch);
require_once "inc/header.php"; 
?>
<title>Document</title>
<?php require_once "inc/nav.php"; ?>
    
<?php require_once "inc/footer.php"; ?>