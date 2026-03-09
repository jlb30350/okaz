<?php
session_start();

require_once 'libs/pdo.php';
require_once 'libs/listing.php';
require_once 'libs/category.php';

$listings = getListings($pdo);
$categories = getCategories($pdo);

require_once 'templates/header.php';
?>

<div class="container py-5">

    <div class="row align-items-center flex-lg-row-reverse g-5 py-4">
        <div class="col-10 col-sm-8 col-lg-6">
            <img
                src="./assets/images/logo-okaz.png"
                class="d-block mx-lg-auto img-fluid"
                alt="Logo Okaz"
                width="400"
                loading="lazy"
            >
        </div>

        <div class="col-lg-6">
            <h1 class="display-5 fw-bold lh-1 mb-3">
                Avec Okaz, achetez et vendez vos objets
            </h1>

            <p class="lead">
                Trouvez ce que vous cherchez ou donnez une seconde vie à vos objets en un clic !
                Okaz est la plateforme incontournable pour vendre, acheter ou échanger tout ce que
                vous souhaitez : vêtements, meubles, appareils électroniques, voitures et bien d'autres.
            </p>

            <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                <a href="annonces.php" class="btn btn-primary btn-lg px-4 me-md-2">
                    Voir les annonces
                </a>
                <a href="ajout_annonce.php" class="btn btn-outline-secondary btn-lg px-4">
                    Déposer une annonce
                </a>
            </div>
        </div>
    </div>

    <div class="container my-5">
        <h2 class="pb-2 border-bottom">Les dernières annonces</h2>

        <?php if (empty($listings)) : ?>
            <p class="mt-4">Aucune annonce pour le moment.</p>
        <?php else : ?>
            <div class="row g-4 py-4">
                <?php foreach ($listings as $listing): ?>
                    <div class="col-md-6 col-lg-4">
                        <?php require 'templates/listing_part.php'; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <div class="container my-5">
        <h2 class="pb-2 border-bottom">Les catégories</h2>

        <?php if (empty($categories)) : ?>
            <p class="mt-4">Aucune catégorie disponible.</p>
        <?php else : ?>
            <div class="row g-4 py-4">
                <?php foreach ($categories as $cat): ?>
                    <div class="col-md-6 col-lg-3">
                        <div class="p-4 border rounded-3 h-100 shadow-sm bg-white">
                            <h4 class="mb-3"><?= htmlspecialchars($cat['nom']) ?></h4>
                            <p class="text-muted mb-0">
                                Découvrez les annonces de la catégorie
                                <?= htmlspecialchars($cat['nom']) ?>.
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

</div>

<?php require_once 'templates/footer.php'; ?>