

<!doctype html>
        <html lang="es">
            <head>
            <!-- Required meta tags -->
            <base href="{BASE_URL}">
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/styles.css" >

            <!-- FOntAwesome -->
            <script src="https://kit.fontawesome.com/065b0452ab.js" crossorigin="anonymous"></script>

            <!-- development version, includes helpful console warnings -->
            <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

            <title>My page title</title>
            </head>
            <body>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-1">
                   <div class="container p-0">
                        <a class="navbar-brand fw-uu mr-4" href="actividades">&#127752; Let's Travel  &#9992;</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavDropdown">
                            <ul class="navbar-nav">

                                <li class="nav-item">
                                    <a class="nav-link" href="actividades">Actividades</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="categorias">Categorias</a>
                                </li>
                            {if $isAdmin}
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/usuarios">Usuarios</a>
                                </li>
                            {/if}
                            </ul>
                            <ul class="navbar-nav float-right">
                            {if $session}
                                <li class="nav-item">
                                    <a class="nav-link" href="admin/cuenta">Mi cuenta</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" href="logout">Logout</a>
                                </li>
                            {else}
                                <li class="nav-item">
                                    <a class="nav-link" href="login">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="registrarse">Registrarse</a>
                                </li>
                            {/if}    
                            </ul>
                        </div>
                   </div>
                </nav>
            <h1 class='text-center mt-4 mb-3 ml-3 mr-3'>{$title}</h1>

