<div class="card h-100 shadow-sm">
    <img
        src="uploads/listing/<?= htmlspecialchars($listing['image_']) ?>"
        class="card-img-top"
        alt="<?= htmlspecialchars($listing['titre']) ?>"
        style="height: 220px; object-fit: cover;"
    >

    <div class="card-body d-flex flex-column">
        <h5 class="card-title mb-2"><?= htmlspecialchars($listing['titre']) ?></h5>

        <p class="card-text text-muted small mb-3">
            <?= htmlspecialchars($listing['description']) ?>
        </p>

        <p class="fw-bold fs-5 mb-3"><?= htmlspecialchars($listing['prix']) ?> €</p>

        <a href="annonce.php?id=<?= (int) $listing['Id_Annonce'] ?>" class="btn btn-outline-primary mt-auto">
            Voir l'annonce
        </a>
    </div>
</div>