<?php
session_start();

$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: index.php");
    exit();
}

$product_key = array_search($id, array_column($_SESSION['products'], 'id'));
$product = $_SESSION['products'][$product_key];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['products'][$product_key] = [
        'id' => $id,
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock']
    ];
    
    header("Location: index.php?status=updated");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi CRUD - Nadine Candra Prabawati</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="header">
        <div class="container">
            <h1><i class="fas fa-edit"></i> Edit Produk</h1>
        </div>
    </div>

    <div class="container">
        <div class="form-container">
            <form action="edit.php?id=<?php echo $id; ?>" method="POST">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" required><?php echo $product['description']; ?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" min="0" value="<?php echo $product['price']; ?>" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" min="0" value="<?php echo $product['stock']; ?>" required>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan Perubahan</button>
                    <a href="index.php" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                </div>
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="container">
        <p>&copy; <?php echo date('Y'); ?> Aplikasi by Nadine</p>
        </div>
    </div>
</body>
</html>