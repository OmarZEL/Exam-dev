<?php
include 'db.php';

$pdo = getPDO();

if ($pdo !== null && $_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute([$name, $description, $price])) {
        echo "Nouveau produit ajoute avec succes.";
    } else {
        echo "Erreur: " . $stmt->errorInfo()[2];
    }
} else {
    echo "Erreur de connexion a la base de donnees.";
}
?>
