<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />



    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="./assets/css/override-bootstrap.css">
    <title>Okaz.local</title>
</head>


<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <img width="120" src="./assets/images/logo-okaz.png" alt="Logo ok">
                </a>
            </div>

           <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
    <li><a href="index.php" class="nav-link px-2 link-secondary">Accueil</a></li>
    <li><a href="annonces.php" class="nav-link px-2">Annonces</a></li>
    
    <?php if (isset($_SESSION['user'])): ?>
        <li><a href="ajout_annonce.php" class="nav-link px-2 text-danger fw-bold">Ajouter une annonce</a></li>
    <?php endif; ?>
</ul>

        <div class="col-md-3 text-end">
    <?php if (isset($_SESSION['user'])): ?>
        <a href="logout.php" class="btn btn-outline-danger me-2">Déconnexion</a>
    <?php else: ?>
        <a href="login.php" class="btn btn-outline-primary me-2">Connexion</a>
        <a href="inscription.php" class="btn btn-primary">Inscription</a>
    <?php endif; ?>
</div>
        </header>
