<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>

<body>
    <?php

    include_once("config_login.php");

    $usr = $_POST['username'];
    $pass = $_POST['password'];
    $hash_pass = hash('sha256', $pass);

    try {
        $pdo = new PDO("mysql:host=" . SERVER_NAME . ";dbname=" . DATABASE_NAME, USER_NAME, PASSWORD);
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    } //Check if username exists

    $sql = "select * from users where (username=? or email=?) and password=?" and active='SI';

    // Use de sentencias prepared

    //select * from users where (username='maria' or email='maria@bigdata.com') and password=SHA2('maria123456', 256);

    //uso de poo-programacion orientada a objeto nombre_objeto->propiedad/metodo

    $stmt = $pdo->prepare($sql);

    $stmt->execute([$usr, $usr, $hash_pass]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        //NO INGRESA
        echo "Datos ingresados no son validos";
    } else {
        //ingresado
        session_start();
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $_SESSION['time'] = date('H:i:s');
        $_SESSION['username'] = $usr;
        $_SESSION['logueado'] = true;
        header("location:welcome.php");
    }

    ?>
</body>

</html>