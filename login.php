<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <?php
    // Acá va el codigo PHP

    define("USER_REAL", "Maria");
    define("PASS_REAL", "maria123456");

    //username

    $usr = $_POST['username'];

    //echo "<br>";

    //password

    $pass = $_POST['password'];

    if ($usr == USER_REAL && $pass == PASS_REAL) {
        echo "<div class='flex flex-col justify-center items-center h-screen'>";
        echo "<h1 class='font-[Raleway] font-extrabold text-3xl'> ¡¡ Bienvenida/o " . USER_REAL .  "!! </h1>";
        echo "<h1 class='font-[Raleway]'>" . date('d-m-Y') . " </h1>";
        echo "</div>";
    } else {
        echo "<div class='flex flex-col justify-center items-center h-screen'";
        echo "<h1  class='font-[Raleway]'> Los datos ingresados son incorrectos. </h1>";
        echo "</div>";
    }


    ?>
</body>

</html>