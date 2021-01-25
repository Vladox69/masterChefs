<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recetas y más</title>
    <link rel="shortcut icon" href="images/logo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="css/estilo-index.css">
    <meta name="viewport" content="width=device-width, user-scalable-yes, initial-scale=1.0">
</head>

<?php
    session_start();
    require_once("controllers/islogin.php");
    if($isconnect){
?>
        <header class="main-header">
            <nav>
                <a href="http://localhost/masterChefs/index.php">Inicio</a>
                <a href="http://localhost/masterChefs/filtrarRecetas/indexFiltro.html">Recetas</a>
                <a href="http://localhost/masterChefs/views/modules/crud.php">Tus recetas</a>
                <a href="http://localhost/masterChefs/views/contacto.html">Contactos</a>
                <a href="controllers/logout.php">Cerrar sesión</a>
            </nav>
    <?php
    echo "Bienvenido ";
    echo $_SESSION['nombre'];
    }else{
    ?>
    <header class="main-header">
    <nav>
            <a href="http://localhost/masterChefs/index.php">Inicio</a>
            <a href="http://localhost/masterChefs/filtrarRecetas/indexFiltro.html">Recetas</a>
            <a href="http://localhost/masterChefs/login.html">Ingresar</a>
            <a href="http://localhost/masterChefs/views/contacto.html">Contactos</a>
        </nav>

    <?php
    }
    ?>
    <body>
    
    <header class="main-header">
        
        <section class="textos-header">
            <h1>Recetas y algo más...</h1>
            <h2>Mira nuestras recetas y compártenos la tuya.</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.99 C150.67,94.04 344.24,-74.70 500.00,49.99 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #ffffff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2>¿Quiénes somos?</h2>
            <div class="contenedor-sobre-nosostros">
                <img src="images/fondoCocinero.png" alt="" class="about-us">
            </div>
            <div class="contenido-textos">
                <h3><span>1</span> Consulta nuestras recetas</h3>
                <p>Disfruta del catálogo de recetas de cocina exquisitas y con instrucciones fáciles de seguir.
                    Bienvenido/a al mundo de la cocina.</p>
                <h3><span>2</span> Publica tus propias recetas</h3>
                <p>Colabora con nuestra comunidad al agregar tus propias recetas y aumentar el número de amantes de la
                    cocina.</p>
                <h3><span>3</span> Contáctanos</h3>
                <p>Para convertirte en colaborador del sitio web, contáctanos y síguenos en nuestras redes sociales.</p>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Lo más popular</h2>
                <div class="galeria-popular">
                    <div class="imagen-popular">
                        <img src="images/flan-leche-condensada.jpg" alt="">
                        <div class="hover-popular">
                            <img src="images/icono-hover.png" alt="">
                            <p>Postres</p>
                        </div>
                    </div>
                    <div class="imagen-popular">
                        <img src="images/bebidas-licores.jpg" alt="">
                        <div class="hover-popular">
                            <img src="images/icono-hover.png" alt="">
                            <p>Bebidas y licores</p>
                        </div>
                    </div>
                    <div class="imagen-popular">
                        <img src="images/desayunos.png" alt="">
                        <div class="hover-popular">
                            <img src="images/icono-hover.png" alt="">
                            <p>Desayunos</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contenedor clientes">
            <h2 class="titulo">Opiniones de nuestros usuarios</h2>
            <div class="tarjetas">
                <div class="tarjeta">
                    <img src="images/perfil-thomas.jpg" alt="">
                    <div class="contenido-texto-tarjeta">
                        <h4>Thomas Mayorga</h4>
                        <p>Me parece una página muy útil ya que divide a las recetas por sus disntintas secciones. ¡Me
                            encanta!</p>
                    </div>
                </div>
                <div class="tarjetas">
                    <div class="tarjeta">
                        <img src="images/perfil-fanny.jpg" alt="">
                        <div class="contenido-texto-tarjeta">
                            <h4>Fanny Soria</h4>
                            <p>Me gusta mucho esta página, sin embargo he tenido problemas al registrar mi cuenta para
                                poder
                                agregar mis recetas. Arreglen eso, por favor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="contenido-footer">
                <h4>Teléfonos</h4>
                <p>0963034181/032765241</p>
            </div>
            <div class="contenido-footer">
                <h4>Email</h4>
                <p>recetasymas@gmail.com</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; GrupoACS</h2>
    </footer>

</body>

</html>