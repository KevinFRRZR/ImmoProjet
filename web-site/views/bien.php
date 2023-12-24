<?php
require_once 'src/Controllers/IndexController.php';
if (isset($bien_id) && isset($logement)) {
    
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImmoProjet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <header class="navbar navbar-expand-lg bg-body-tertiary">
        <nav class="container-fluid">
            <a class="navbar-brand" href="">ImmoProjet</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Résidentiel</a>
                    </li>
                    <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Logout</a>
                    </li>
                </ul>
        </nav>
    </header>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="jumbotron text-center">
                        <h1 class="display-4">Bienvenue sur ton site</h1>
                        <p class="lead">Explorer les derniers Bien.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <?php foreach ($biens as $key => $bien) {
                        $logement = [];
                        $terrain = [];
                        if ($bien->logement_id != null) {
                            $logement = $indexController->getLogementById($bien->logement_id);
                        } else {
                            $terrain = $indexController->getTerrainById($bien->terrain_id);
                        }
                    ?>
                        <div class="article-box">

                            <h2><?= $logement == null ? $terrain->nom : $logement->nom ?></h2>
                            <img src="img/<?= $key ?>.jpg" alt="bien" width="100vw">
                            <p><?= $bien->description ?></p>
                            <a href="views/bien.php?<?= $bien->id ?>" class="btn btn-primary">En savoir plus</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>