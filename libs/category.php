<?php
function getCategories(PDO $pdo): array {
    // On récupère les catégories réelles (Jeux vidéos, Meubles, etc.)
    $query = $pdo->prepare("SELECT * FROM Categorie");
    $query->execute();
    return $query->fetchAll();
}
?>