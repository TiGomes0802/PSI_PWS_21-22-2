<!doctype html>
<html lang="en" class="h-100">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <title><?php echo APP_NAME?></title>

    <script src="././public/js/script.js"></script>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sticky-footer-navbar/">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">


    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>

    <!-- Custom styles for this template -->
    <link href="sticky-footer-navbar.css" rel="stylesheet">
</head>
<body class="d-flex flex-column h-100">

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand"><?= $empresa->designacaosocial ?></a><!-- TODO:ALTERAR -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <?php
                    if(isset($_SESSION['id'])){
                        if($user->role == 'funcionario' or $user->role == 'admin'){
                            echo'<li class="nav-item">
                                <a class="nav-link'; if($controller == 'empresa'){echo ' active'; }
                            echo '" href="./router.php?c=empresa&a=show&id=1">Empresa</a>
                            </li>';
                            echo'<li class="nav-item">
                                <a class="nav-link'; if($controller == 'fatura'){echo ' active'; }
                            echo '" href="./router.php?c=fatura&a=index">Faturas</a>
                            </li>';
                            echo'<li class="nav-item">
                                <a class="nav-link'; if($controller == 'user'){echo ' active'; }
                            echo '" href="./router.php?c=user&a=index">Clientes</a>
                            </li>';
                            echo'<li class="nav-item">
                                <a class="nav-link'; if($controller == 'produto'){echo ' active'; }
                            echo '" href="./router.php?c=produto&a=index">Produtos</a>
                            </li>';
                        }
                        if($user->role == 'cliente'){
                            echo'<li class="nav-item">
                                <a class="nav-link'; if($controller == 'fatura'){echo ' active'; }
                            echo '" href="./router.php?c=fatura&a=minhasfaturas">Minhas Faturas</a>
                            </li>';
                        }
                    }
                    ?>
                </ul>
                <?php if(isset($_SESSION['id'])){
                    echo '<li class="nav-item"> <text style="color: white">'. $user->role .' - '. $user->username . ' <text></li>';
                    if($user->role == 'funcionario' or $user->role == 'admin'){
                        echo '<a class="nav-link" href="./router.php?c=user&a=edit&id='.$user->id.'">
                            <button class="btn btn-sm btn-outline-light">Editar perfil</button>
                        </a>';
                    }
                    echo '<a class="nav-link" href="./router.php?c=auth&a=logout">
                            <button class="btn btn-sm btn-outline-warning">Logout</button>
                        </a>';
                    }
                ?>
            </div>
        </div>
    </nav>
</header>

<!-- Begin page content -->
<main class="flex-shrink-0">
    <div class="container container_margem">

