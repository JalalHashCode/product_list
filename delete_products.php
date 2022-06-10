<?php 
$s = 1234;

require './db.php';

if(isset($_POST['ids'])){
    deleteProducts($_POST['ids']);
}
header('Location: products.php');
exit();