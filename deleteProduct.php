<?php
include 'db.php';

$pdo = getPDO();

if ($pdo !== null && $_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['id'];

    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$product_id])) {
        echo "Produit supprime avec succes.";
    } else {
        echo "Erreur: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Erreur de connexion a la base de donnees.";
}
?>
