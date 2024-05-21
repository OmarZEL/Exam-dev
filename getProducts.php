<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$pdo = getPDO();

if ($pdo !== null) {
    $sql = "SELECT * FROM products";
    $stmt = $pdo->query($sql);

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($products);
} else {
    echo "Erreur de connexion a la base de donnees.";
}
?>
