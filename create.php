// Nadine Candra Prabawati - 245150401111018
<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_product = [
        'id' => count($_SESSION['products']) + 1,
        'name' => $_POST['name'],
        'description' => $_POST['description'],
        'price' => $_POST['price'],
        'stock' => $_POST['stock']
    ];
    
    array_push($_SESSION['products'], $new_product);
    header("Location: index.php?status=created");
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
            <h1><i class="fas fa-plus-circle"></i> Tambah Produk Baru</h1>
        </div>
    </div>
    <div class="container">
        <div class="form-container">
            <form action="create.php" method="POST">
                <div class="form-group">
                    <label for="name">Nama Produk</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="description">Deskripsi</label>
                    <textarea id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Harga</label>
                    <input type="number" id="price" name="price" min="0" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stok</label>
                    <input type="number" id="stock" name="stock" min="0" required>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
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