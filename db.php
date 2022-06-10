<?php
if(is_null($s)){
    header('Location: products.php');
    die();
}
$host = 'localhost';
$username='root';
$password="";
$dbname='soso';

$conn = mysqli_connect($host, $username, $password, $dbname);

if(!$conn){
    die ("connection error".mysqli_connect_error());
}

function getAllProducts(){
    $query = "SELECT * FROM `products`";
    global $conn;
    $result = mysqli_query($conn, $query);
    $data = [];
    if($result){
        $data = mysqli_fetch_all($result);
    }
    return $data;
}

function deleteProducts($ids){
    $query = "DELETE FROM `products` where `sku` in ($ids)";
    global $conn;
    $result = mysqli_query($conn, $query);
}