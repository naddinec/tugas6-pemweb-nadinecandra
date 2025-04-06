// Nadine Candra Prabawati - 245150401111018
<?php
session_start();

$id = $_GET['id'] ?? null;

if ($id) {
    $product_key = array_search($id, array_column($_SESSION['products'], 'id'));
    if ($product_key !== false) {
        array_splice($_SESSION['products'], $product_key, 1);
    }
    header("Location: index.php?status=deleted");
    exit();
}

header("Location: index.php");
exit();
?>