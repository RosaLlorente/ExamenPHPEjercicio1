<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TiendaPHP</title>

    <!--ENLACE CSS DE BOOTSTRAP-->
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
    crossorigin="anonymous"
    />
    <!--ENLACE CSS PROPIO-->
    <link rel="stylesheet" href="<?=BASE_URL?>/public/CSS/Style.css" name="EstilosPersonalizadosPropios" content="Archivo que contiene css propio">

</head>
<body>
<header class="w-100" style="z-index: 1;">
    <nav class="navbar navbar-expand-lg bg-body-tertiary w-100 position-fixed">
        <div class="container-fluid">
                <a class="Marca navbar-brand" href="<?=BASE_URL?>">Clinica</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?=BASE_URL?>">Ver Catalogo</a>
                        </li>
                    </ul>
                </div>
                <?php if(!isset($_SESSION['user_id'])): ?>
                    <div>
                        <a class="btn btn-outline-success" href="<?=BASE_URL?>">Iniciar Sesión</a>
                        <a class="btn btn-outline-success" href="<?=BASE_URL?>">Registrarse</a>
                    </div>
                <?php else: ?>
                    
                <div>
                    <b>Bienvenido, <?= htmlspecialchars($_SESSION['user_name']); ?> </b>
                    <a class="btn btn-outline-success" href="<?=BASE_URL?>logout">Cerrar Sesión</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>
<main>