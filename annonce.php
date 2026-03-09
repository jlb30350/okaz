<?php
session_start();

require_once 'libs/pdo.php';
require_once 'libs/listing.php';
require_once 'templates/header.php';

$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$minPrice = isset($_GET['min_price']) && $_GET['min_price'] !== '' ? (float) $_GET['min_price'] : null;
$maxPrice = isset($_GET['max_price']) && $_GET['max_price'] !== '' ? (float) $_GET['max_price'] : null;

$listings = getFilteredListings($pdo, $search, $minPrice, $maxPrice);

if (empty($listings)) {
    echo '<div class="container mt-5"><div class="alert alert-danger">Aucune annonce trouvee.</div></div>';
    require_once 'templates/footer.php';
    exit();
}

if (!isset($_GET['id']) || empty($_GET['id'])) {
    echo '<div class="container mt-5"><div class="alert alert-danger">Annonce introuvable.</div></div>';
    require_once 'templates/footer.php';
    exit();
}

$id = (int) $_GET['id'];
$listing = getListingById($pdo, $id);

if (!$listing) {
    echo '<div class="container mt-5"><div class="alert alert-danger">Annonce non trouvée.</div></div>';
    require_once 'templates/footer.php';
    exit();
}
?>

<div class="container py-5">
    <div class="row g-5 align-items-start">
        <div class="col-md-6">
            <img
                src="uploads/listing/<?= htmlspecialchars($listing['image_']) ?>"
                alt="<?= htmlspecialchars($listing['titre']) ?>"
                class="img-fluid rounded shadow-sm"
                style="width: 100%; max-height: 500px; object-fit: cover;"
            >
        </div>

        <div class="col-md-6">
            <h1 class="mb-3"><?= htmlspecialchars($listing['titre']) ?></h1>

            <p class="fs-3 fw-bold text-primary mb-4">
                <?= htmlspecialchars($listing['prix']) ?> €
            </p>

            <p class="text-muted mb-4">
                <?= nl2br(htmlspecialchars($listing['description'])) ?>
            </p>

            <a href="annonces.php" class="btn btn-outline-secondary">
                Retour aux annonces
            </a>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>