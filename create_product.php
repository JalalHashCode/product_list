<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Add New Product</title>
    <style>
        body{
            padding: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <form action="./store_product.php" method="post" id="product_form">
                <div class="mb-3" style="display: flex; justify-content:space-between;">
                    <h2 for="khara"> Add New Product</h2>
                    <div>
                        <button class="btn btn-success" name="save" type="submit">Save</button>
                        <a class="btn btn-secondary" onclick="resetForm()">Cancel</a>
                    </div>
                </div>
                <hr>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">SKU</label>
                    <div class="col-sm-10">
                    <input type="text" name="data[sku]" class="form-control" id="sku">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="data[name]" id="name">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Price ($)</label>
                    <div class="col-sm-10">
                    <input type="number" name="data[price]" class="form-control" id="price">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Type Switcher</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="data[productType]" id="productType" onchange="event_handler()">
                            <option value="Default" selected>Select an option</option>
                            <option value="DVD">DVD</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Book">Book</option>
                        </select>
                    </div>
                </div>
                <div id="generated"></div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var form_gen = document.getElementById('generated')

        function event_handler(){
            let d = document.getElementById('productType').value
            console.log(d)
            switch(d){
                case 'DVD': generateDVDForm();break;
                case 'Furniture': generateFurnForm();break;
                case 'Book': generateBookForm();break;
            }
        }

        function generateDVDForm(){
            var form_gen = document.getElementById('generated')
            form_gen.innerHTML = ''
            form_gen.innerHTML = ` 
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Size (MB)</label>
                <div class="col-sm-10">
                    <input type="number" name="data[size]" class="form-control" id="SIZE">
                 </div> 
            </div>`;
        }

        function generateFurnForm(){
            var form_gen = document.getElementById('generated')
            form_gen.innerHTML = ''
            form_gen.innerHTML = ` 
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Height (CM)</label>
                <div class="col-sm-10">
                    <input type="number" name="data[height]" class="form-control" id="height">
                </div>
            </div>
            
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Width (CM)</label>
                <div class="col-sm-10">
                    <input type="number" name="data[width]" class="form-control" id="width">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Length (CM)</label>
                <div class="col-sm-10">
                    <input type="number" name="data[length]" class="form-control" id="length">
                </div>
            </div>
            `;
        }

        function generateBookForm(){
            var form_gen = document.getElementById('generated')
            form_gen.innerHTML = ''
            form_gen.innerHTML = ` 
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Weight (KG)</label>
                <div class="col-sm-10">
                    <input type="number" name="data[weight]" class="form-control" id="weight">
                </div>
            </div>
            `;
        }

        function resetForm(){
            location.href = "products.php";
        }
    </script>

</body>
</html>