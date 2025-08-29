<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Work+Sans:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/style.css">
    <title>Pizzeria Pizze il Napolitano</title>
    <meta name="description" content="Las mejores pizzas de San Martín, Buenos Aires. Masa artesanal, 
        ingredientes frescos y sabores únicos. Pedí online con delivery rápido a toda la zona norte del GBA.">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div id="header-container">
            <div id="logo">
                <a href="index.html"><img src="img/pizza.svg" alt="logo napolitano"></a>
                <a href="index.html"><img class="logo-text" src="img/text.svg" alt="nombre pizzeria"></a>
            </div>
            <nav>
                <ul>
                    <li><a href="index.html">HOME</a></li>
                    <li><a href="nosotros.html">NOSOTROS</a></li>
                    <li><a href="sucursales.html">SUCURSALES & DELIVERY</a></li>
                    <li><a href="contacto.html">CONTACTO</a></li>
                    <li><a href="login.html">LOGIN</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main-content">
        <h2 class="animate__animated animate__rubberBand">Nuestras Pizzas</h2>
        <div id="cart">
             <div id="subtotal">
        <p>Total: $<span id="total-amount">0</span></p>
      </div>
            <i class="fa badge" id="badge" value="0"><i class="fa-solid fa-cart-shopping fa-xl"></i></i>
        </div>
         <ul class="gallery">
        <?php

                    include_once("config_products.php");
                    include_once("db.class.php");
                    $link = new Db();
                    $sql ="select p.id_product,c.category_name,p.image,p.product_name,p.price, date_format(p.start_date,'%d/%m/%Y') as date from products p inner join categories c 
on p.id_category=c.id_category order by c.category_name,p.price";
                    $stmt=$link->run($sql);
                    $data=$stmt->fetchAll();
                    //recuperar un producto y llevarlo al li(ul)
                    foreach($data as $row){
                ?>
       
            <li>
                <div class="box">
                    <figure><img src="<?php echo $row['image']  ?>" class="img-pizzas">
                        <figcaption>
                            <h3><?php echo $row['product_name'] ?></h3>
                            <p><?php echo $row['price'] ?></p>
                            <time><?php echo $row['date'] ?></time>
                        </figcaption>
                        </figure>
                         <button class="button" value=<?php echo $row['id_product']  ?>" data-price="<?php echo $row['price']  ?>">Añadir al carrito
                            <i class="fa-solid fa-cart-shopping fa-lg"></i>
                        </button>
                    </div>
                    </li>
                <?php
                    }  ?>
                    </ul>
                    </div>

                <footer>
        <div class="footer-content">
            <div class="footer-nav">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Sucursales & Delivery</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                     <li><a href="login.html">LOGIN</a></li>
                </ul>
            </div>
            <!-- Redes sociales -->
            <div class="footer-social" id="social">
                <a href="https://www.facebook.com/user"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com/user"></a><i class="fab fa-twitter"></i></a>
                <a href="https://www.instagram.com/user"></a><i class="fab fa-instagram"></i></a>
            </div>
            <div class="footer-copyright">
                <p> &copy;
                    <script>
                        let currentYear = new Date().getFullYear();
                        document.write(currentYear);
                    </script> Pizzeria Pizze il Napolitano. Todos los derechos reservados.
                </p>
            </div>
        </div>
    </footer>
    <script src="js/main.js"></script>
    
    <!-- script en JS -->
    <script>

        //
        const countButtons = document.querySelectorAll("button").length;
        let products = [];  //arreglo para  guardar las pizzas seleccionadas (carrito)
        let totalPrice = 0;


        //bucle para para recorrer los botones clickeados
        for (let i = 0; i < countButtons; i++) {

            document.querySelectorAll("button")[i].addEventListener("click", showValue);

        }


        //funcion para mostrar valores en el carrito de compra en caso que se haya hecho click
        function showValue() {

            if (products.includes(this.value)) {
                // si el producto ya esta en el arreglo, no tendria que seleeccionar el mismo producto
                return;
            } else {
                //si hace click cuando una pizza no esta en el carrito
                // se hizo click sobre el boton para comprar una pizza
                // Cambiar color a Rojo
                this.style.backgroundColor = "#e50c39";
                this.innerHTML = `Agregado <i class="fa-solid fa-cart-shopping"></i>`;

                products.push(this.value);   // push agrega al final de la lista un elemento
                console.log(products);
                document.getElementById("badge").setAttribute("value", products.length);
            }

            let price = parseFloat(this.getAttribute("data-price"));
            totalPrice = totalPrice + price;
            console.log("Total : " + totalPrice);

             document.getElementById("subtotal").style.display="block";
              // Total Price
   document.getElementById("total-amount").textContent=totalPrice;
        }


        
    </script>

</body>

</html>