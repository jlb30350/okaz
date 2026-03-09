<?php

function addListing(PDO $pdo, string $title, string $description, float $price, int $category_id, string $image, int $user_id): bool
{
    $sql = "INSERT INTO Annonce (titre, description, prix, image_, Id_Categorie, Id_Utilisateur)
            VALUES (:title, :description, :price, :image, :category_id, :user_id)";

    $query = $pdo->prepare($sql);

    return $query->execute([
        ':title' => $title,
        ':description' => $description,
        ':price' => $price,
        ':image' => $image,
        ':category_id' => $category_id,
        ':user_id' => $user_id
    ]);
}

function getListings(PDO $pdo): array
{
    $query = $pdo->prepare("SELECT * FROM Annonce ORDER BY Id_Annonce DESC");
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

function getListingById(PDO $pdo, int $id): array|false
{
    $query = $pdo->prepare("SELECT * FROM Annonce WHERE Id_Annonce = :id");
    $query->execute([':id' => $id]);
    return $query->fetch(PDO::FETCH_ASSOC);
}