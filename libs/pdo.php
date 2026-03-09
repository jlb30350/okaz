<?php
try {
    $pdo = new PDO('mysql:dbname=okaz;host=127.0.0.1;charset=utf8mb4', 'root', '');
    // AJOUTE CETTE LIGNE : elle force l'affichage des erreurs SQL
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
} catch (Exception $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
