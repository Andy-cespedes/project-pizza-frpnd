<?php
$product = $_POST['producto'];
$price = $_POST['precio'];
$category = $_POST['categoria'];

include_once("config_products.php");
include_once("db.class.php");
$link = new Db();
$sql="insert into products(id_category,price,produc_name) values ($category,$price,$product)";
