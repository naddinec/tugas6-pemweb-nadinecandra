<?php
session_start();

if (!isset($_SESSION['products'])) {
    $_SESSION['products'] = [
        ['id' => 1, 'name' => 'Laptop ASUS', 'description' => 'Laptop gaming', 'price' => 12000000, 'stock' => 10],
        ['id' => 2, 'name' => 'Smartphone Samsung', 'description' => 'Flagship phone', 'price' => 8500000, 'stock' => 15]
    ];
}

if (isset($_GET['status'])) {
    $status = $_GET['status'];
    if ($status == 'created') {
        $message = "Data berhasil ditambahkan!";
    } elseif ($status == 'updated') {
        $message = "Data berhasil diperbarui!";
    } elseif ($status == 'deleted') {
        $message = "Data berhasil dihapus!";
    }
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
            <h1><i class="fas fa-box-open"></i> Manajemen Produk</h1>
        </div>
    </div>

    <div class="container">
        <?php if (isset($message)): ?>
            <div class="alert alert-success">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <div class="table-container">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h2 style="color: #1e88e5;">Daftar Produk</h2>
                <a href="create.php" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Produk</a>
            </div>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($_SESSION['products'] as $product): ?>
                        <tr>
                            <td><?php echo $product['id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td>Rp <?php echo number_format($product['price'], 0, ',', '.'); ?></td>
                            <td><?php echo $product['stock']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $product['id']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a>
                                <a href="delete.php?id=<?php echo $product['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i> Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Aplikasi by Nadine</p>
        </div>
    </div>
</body>
</html>