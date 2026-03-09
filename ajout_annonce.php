<?php
session_start();
require_once 'libs/pdo.php';
require_once 'libs/listing.php';
require_once 'libs/category.php';

if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}

$categories = getCategories($pdo);
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['title']);
    $prix = (float) $_POST['price'];
    $description = trim($_POST['description']);
    $categorie = (int) $_POST['category'];
    $userId = (int) $_SESSION['user']['Id_Utilisateur'];

    $imageName = 'default.jpg';

    if (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_NO_FILE) {
        if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            $error = "Erreur upload PHP : " . $_FILES['file']['error'];
        } elseif ($_FILES['file']['size'] > 5 * 1024 * 1024) {
            $error = "Image trop volumineuse (max 5MB)";
        } else {
            $originalName = $_FILES['file']['name'];
            $tmpName = $_FILES['file']['tmp_name'];

            $check = getimagesize($tmpName);
            if ($check === false) {
                $error = "Le fichier n'est pas une image valide.";
            } else {
                $extension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));
                $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

                if (!in_array($extension, $allowedExtensions)) {
                    $error = "Format non autorisé : " . $extension;
                } else {
                    $imageName = uniqid('annonce_', true) . '.' . $extension;
                    $destination = __DIR__ . '/uploads/listing/' . $imageName;

                    if (!is_dir(__DIR__ . '/uploads/listing/')) {
                        $error = "Le dossier uploads/listing n'existe pas.";
                    } elseif (!is_writable(__DIR__ . '/uploads/listing/')) {
                        $error = "Le dossier uploads/listing n'est pas accessible en écriture.";
                    } elseif (!is_uploaded_file($tmpName)) {
                        $error = "Le fichier temporaire n'est pas reconnu comme uploadé : " . $tmpName;
                    } elseif (!move_uploaded_file($tmpName, $destination)) {
                        $error = "Échec move_uploaded_file. tmp = " . $tmpName . " | destination = " . $destination;
                    }
                }
            }
        }
    }

    if (empty($error)) {
        $result = addListing($pdo, $titre, $description, $prix, $categorie, $imageName, $userId);

        if ($result) {
            header('Location: annonces.php');
            exit();
        } else {
            $error = "Erreur lors de l'enregistrement de l'annonce.";
        }
    }
}

require_once 'templates/header.php';
?>

<div class="container mt-5">
    <h1>Ajouter une annonce</h1>

    <?php if (!empty($error)) : ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input class="form-control" type="text" name="title" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Prix</label>
            <input class="form-control" type="number" step="0.01" name="price" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" rows="4"></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <select name="category" class="form-select" required>
                <?php foreach ($categories as $cat) : ?>
                    <option value="<?= (int) $cat['Id_Categorie'] ?>">
                        <?= htmlspecialchars($cat['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Photo</label>
            <input class="form-control" type="file" name="file" accept=".jpg,.jpeg,.png,.webp">
        </div>

        <button class="btn btn-primary" type="submit">Enregistrer</button>
    </form>
</div>

<?php require_once 'templates/footer.php'; ?>