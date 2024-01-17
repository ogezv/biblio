<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="site sur rien">
    <meta name="keywords" content="livres">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/quartz/bootstrap.min.css">
    <title>Biblio | <?= $titre ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="/">Biblio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active fw-bold" href="/">Accueil
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold" href="a-propos">A propos</a>
                    </li>
                    <?php if (!empty($_SESSION)) : ?>
                        <li class="nav-item">
                            <a class="nav-link fw-bold" href="livres">Livres</a>
                        </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <?php if (empty($_SESSION)) : ?>
                            <a class="nav-link fw-bold" href="connexion">Connexion</a>
                        <?php else : ?>
                            <a class="nav-link fw-bold" href="deconnexion">Déconnexion</a>
                        <?php endif ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="container" class="m-2">
        <h1 class="rounded border border-dark p-2 m-2 text-center bg-primary"><?= $titre ?></h1>
        <?= $content ?>
    </div>
                   
    <!-- javascript bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>