<?php
$produk_list = [
    [
        "nama" => "Mouse Wireless Silent",
        "kategori" => "Aksesoris Komputer",
        "harga" => 150000,
        "stok" => 15,
    ],
    [
        "nama" => "Keyboard Mechanical RGB",
        "kategori" => "Aksesoris Komputer",
        "harga" => 450000,
        "stok" => 8,
    ],
    [
        "nama" => "Headset Gaming Surround",
        "kategori" => "Audio",
        "harga" => 320000,
        "stok" => 0,
    ],
    [
        "nama" => "Webcam Full HD 1080p",
        "kategori" => "Kamera & Video",
        "harga" => 275000,
        "stok" => 5,
    ],
    [
        "nama" => "Monitor Gaming 24 Inch 144Hz",
        "kategori" => "Display",
        "harga" => 1800000,
        "stok" => 4,
    ],
    [
        "nama" => "Laptop Productivity Core i5",
        "kategori" => "Laptop",
        "harga" => 8500000,
        "stok" => 3,
    ]
];

$total_produk = count($produk_list);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cia Store - Katalog Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <div class="logo">Cia Store</div>
        <nav>
            <a href="#">Home</a>
            <a href="#">Products</a>
            <a href="#">About</a>
        </nav>
    </header>

    <section class="hero">
        <span class="badge-hero">CIA STORE</span>
        <h1>Simple Tech Store.</h1>
        <p>Temukan berbagai perangkat dan aksesoris teknologi untuk kebutuhanmu.</p>
        <a href="#products" class="btn-hero">Lihat Produk</a>
    </section>

    <div class="container" id="products">
        <div class="info-bar">
            <span>OUR PRODUCTS</span>
            <h2>Katalog Produk</h2>
            <div class="total-count">Total Produk: <strong><?= $total_produk ?></strong></div>
        </div>

        <main class="product-grid">
            <?php foreach ($produk_list as $produk) : ?>
                <?php 
                    $ada_diskon = $produk['harga'] >= 1000000;
                    $persen_diskon = 10;
                    $harga_akhir = $ada_diskon 
                        ? $produk['harga'] - ($produk['harga'] * ($persen_diskon / 100)) 
                        : $produk['harga'];
                ?>

                <div class="card">
                    <div class="card-body">
                        <div class="card-header-info">
                            <span class="category"><?= htmlspecialchars($produk['kategori']) ?></span>
                            <?php if ($ada_diskon) : ?>
                                <span class="badge-discount">DISKON <?= $persen_diskon ?>%</span>
                            <?php endif; ?>
                        </div>

                        <h3 class="product-name"><?= htmlspecialchars($produk['nama']) ?></h3>
                        
                        <div class="price-container">
                            <?php if ($ada_diskon) : ?>
                                <span class="old-price">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></span>
                                <span class="final-price">Rp <?= number_format($harga_akhir, 0, ',', '.') ?></span>
                            <?php else : ?>
                                <span class="final-price">Rp <?= number_format($produk['harga'], 0, ',', '.') ?></span>
                            <?php endif; ?>
                        </div>

                        <?php if ($produk['stok'] > 0) : ?>
                            <span class="status available">Tersedia</span>
                            <div class="stock-count">Stok: <?= $produk['stok'] ?></div>
                        <?php else : ?>
                            <span class="status out-of-stock">Stok Habis</span>
                            <div class="stock-count">Stok: 0</div>
                        <?php endif; ?>
                    </div>

                    <div class="card-footer">
                        <?php if ($produk['stok'] > 0) : ?>
                            <button class="btn btn-primary">Beli Sekarang</button>
                        <?php else : ?>
                            <button class="btn btn-disabled" disabled>Stok Habis</button>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </main>
    </div>

    <footer>
        &copy; <?= date('Y') ?> Cia Store. All rights reserved.
    </footer>

</body>
</html>