<?php
$s = 1234;
require './db.php';



function add_product($sku, $name, $price, $type, $details){
    $query = "INSERT INTO `products` (`sku`, `name`, `price`, `type`, `details`) VALUES ('$sku', '$name', $price, '$type', '$details')";   
    global $conn;
    mysqli_query($conn, $query);
}

function getDetails($data){
    $type= $data['productType'];
    $details = '';
    if($type === 'DVD'){
        $details = (string)$data['size'];
    }
    elseif($type === 'Furniture'){
        $details = strval($data['height']) . ' x ' . strval($data['width']) . ' x ' . strval($data['length']);
    }
    elseif($type === 'Book'){
        $details = (string) $data['weight'];
    }
    return $details;
}



if(isset($_POST['save']) )
{
    $data = $_POST['data'];
    $sku = $data['sku'];
    $name = $data['name'];
    $price = $data['price'];
    $type = $data['productType'];
    $details = getDetails($data);
    add_product($sku, $name, $price, $type, $details);
}
header('Location: products.php');
exit();

