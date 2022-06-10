<!DOCTYPE html>
<html>
<head>

<title>
    ProductList

</title>
</head>

<body>

    <?php 

    $submitted_values = array("sku"=>$_POST['sku'], 
    "name"=>$_POST['name'],
    "price"=>$_POST['price'],
    "size"=>$_POST['size'],
    "height"=>$_POST['height'],
    "length"=>$_POST['length'],
    "width"=>$_POST['width'],
    "weight"=>$_POST['weight'],
    );

   
   
   ?>

<button id="myButton" class="float-left submit-button" >AddProduct</button>

<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "productAdd.php";
    };
</script>

<br>

</pre>

<?php

//classes constructed
include('newClasses.php') ;

    $Dvd_obj = new Dvd($submitted_values) ;
    $Fur_obj = new Furniture($submitted_values) ;
    $Book_obj = new Book($submitted_values) ;
    
    $final = $Book_obj ->get_my_special_property();
    
   




/////database
    include('db.php');
?>
</body>
</html>