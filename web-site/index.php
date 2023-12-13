<?php
require_once 'src/Controllers/IndexController.php';

$indexController = new IndexController();
$biens = $indexController->getBien();

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
                        <a class="nav-link" href="/logout">Résidentiel</a>
                    </li>
                    <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">Logout</a>
                    </li>
                </ul>
        </nav>
    </header>
    <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="jumbotron text-center">
                        <h1 class="display-4">Welcome to Our Website</h1>
                        <p class="lead">Explore the latest articles below.</p>
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
                            <h2><?= $logement->nom == null ? $terrain->nom : $logement->nom ?></h2>
                            <p><?= $logement->nom == null ? "" : $logement->description ?></p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    <?php } ?>
                    <!-- Article 1 -->


                    <!-- Article 2 -->
                    <div class="article-box">
                        <h2>Article Title 2</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. ...</p>
                        <a href="#" class="btn btn-primary">Read More</a>
                    </div>

                    <!-- Add more articles as needed -->
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>