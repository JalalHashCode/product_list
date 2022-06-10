<?php

    $s = 1234;
    require './db.php';
    $data = getAllProducts();
    function getDetailsString($type, $details){
        switch($type){
            case 'DVD': return'Size: '.$details .' MB';break;
            case 'Furniture':return 'Dimension: '.$details;break;
            case 'Book':return 'Weight: '.$details .'KG';break;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Products</title>
    <style>
        body{
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h2>Product List</h2>
            </div>
            <div class="col-md-6"></div>
            <div class="col-md-3">
                <a class="btn btn-success" href="create_product.php">Add</a>
                <form style="display:none;" action="./delete_products.php" id="delete_form" method="post">

                </form>
                <button class="btn btn-secondary" id="delete-product-btn" onclick="deleteProducts()">mass delete</button>
            </div>
            <div class="col-md-11">
                <hr>
            </div>
        </div>
        <div class="row">
            <?php foreach($data as $key => $value): ?>
                <div class="card" style="width:18rem; margin-top:15px;">
                    <div class="card-body" style="text-align:center;">
                    <div class="form-check">
                        <input class="form-check-input delete-checkbox" type="checkbox" class="" value="" id="<?php echo $value[0]?>" >
                        
                    </div>
                        <h5><?php echo $value[0] ?></h5>
                        <h5><?php echo $value[1] ?></h5>
                        <h6><?php echo number_format($value[2],2). ' $' ?></h6>
                        <h6><?php echo getDetailsString( $value[3], $value[4]) ?></h6>
                    </div>
                </div>
                <div class="col-sm-1"></div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        function deleteProducts(){
            let checkboxes = document.getElementsByClassName('delete-checkbox');
            let ids_array = [];
            for (let element of checkboxes)
            {
                if(element.checked)ids_array.push("'"+element.id+"'");
            }
            console.log(ids_array)
            ids_string = ids_array.join(',')            
            let form = document.getElementById('delete_form')
            form.innerHTML = `
            <input name="ids" value="${ids_string}"></input>
            `;
            form.submit()
        }
    </script>

</body>
</html>




