?php

session_start();
if ($_SESSION['logueado']){
include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
$idUpt= $_GET['q'];
$sql = "select p.id_product,c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from pr
$stmt=$link->run($sql);
$data = $atmt->fetch();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <div class="row">
    <div class="col-md-12">
                <h3 class="text-center">ACTUALIZAR PRODUCTOS</h3>

    </div>
         <div class="col-md-12">
           <form class="form-group" accept-charset="utf-8" action="update_products.php" method="post">
            <div class="form-group">
            <input type="hidden"name="id" value="<?php echo $data ['id_product'] ?>">
            </div>

             <div class="form-group">
               <label class="control-label">NOMBRE</label>
               <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $data['product_name'] ?>">
             </div>

             <div class="form-group">
               <label class="control-label">Precio</label>
               <input id="nombre" name="precio" class="form-control" type="text" value="<?php echo $data['product_name'] ?>">
             </div>

             <div class="froum-group">
               <label class="control-label">categoria</label>
               <input id="nombre" name="categoria" class="form-control" type="text" value="<?php echo $data['category_name'] ?>">
             </div>

             <div class="form-group">
               <label class="control-label">start_date</label>
               <input id="nombre" name="start_date" class="form-control" type="text" value="<?php echo $data['start_date'] ?>">
             </div>

             <div class="form-group">
               <label class="control-label">image</label>
               <input id="nombre" name="image" class="form-control" type="text" value="<?php echo $data['image'] ?>">
             </div>

        </div>
        </form>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
