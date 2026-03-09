<?php
session_start();
require_once 'libs/pdo.php';
require_once 'libs/listing.php';
require_once 'libs/category.php';

$listings = getListings($pdo);

require_once 'templates/header.php';
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <h2>Filtres</h2>

            <form action="" method="get">
                <div class="mb-3">
                    <input type="text" name="search" class="form-control" placeholder="Rechercher">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prix min</label>
                    <input type="number" name="min_price" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Prix max</label>
                    <input type="number" name="max_price" class="form-control">
                </div>

                <button class="btn btn-primary w-100">Filtrer</button>
            </form>
        </div>

        <div class="col-md-9">
            <h2 class="mb-4">Les annonces</h2>

            <?php if (empty($listings)) : ?>
                <p>Aucune annonce pour le moment.</p>
            <?php else : ?>
                <div class="row g-4">
                    <?php foreach ($listings as $listing): ?>
                        <div class="col-md-6 col-lg-4">
                            <?php require 'templates/listing_part.php'; ?>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>