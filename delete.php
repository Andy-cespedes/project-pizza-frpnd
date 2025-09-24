
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>delete</title>
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css">
</head>

<body>
    
   <?php
session_start();

if ($_SESSION['logueado']){

include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
$idDel=$_GET['q'];
//delete from products where id_product=13
$sql="delete from products where id_product=".$idDel;
$stmt=$link->run($sql);
header('location:welcome.php');
}

?>
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>
</body>
</html>
