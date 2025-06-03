<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Website pesan makanan kantin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="styleForm.css">
  <style>
    .hero {
    background-color: white;
}

.img-fluid {
    width: 450px;
}

#about {
    background-color: black;
    color: white;
}
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-black sticky-top navbar-dark">
  <div class="container">
    <img src="img/logo.png" alt="logo" class="rounded-circle" width="50" height="50">
    <a class="navbar-brand" href="#">Abidzar Al-Ghifari</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="#about" class="nav-link">About</a></li>
        <li class="nav-item"><a href="#cafeteria" class="nav-link">Opsi</a></li>
        <li class="nav-item"><a href="#htb" class="nav-link">Buy</a></li>
        <li class="nav-item"><a href="#contact" class="nav-link">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- hero -->
<section class="hero text-center py-5">
  <div class="container">
    <iframe width="560" height="315" src="https://www.youtube.com/embed/BksBNbTIoPE?autoplay=1&mute=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
      <h1>Selamat Datang!</h1>
      <p class="lead">Di kantin Telkom sehat</p>
  </div>
</section>

<!-- About -->
<section id="about" class="py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-md-6">
        <img src="img/kantin.jpeg" class="img-fluid" width="500" alt="Foto Kantin">
      </div>
      <div class="col-md-6">
        <h2>About Kantin</h2>
        <p>Telkom School Memiliki kantin dengan berbagai makanan yang sehat dan higenis, kami selalu mengutamakan kualitas dalam produk kami.</p>
        <p>kami menjamin setiap makanan yang dijual sehat dan bergiji.</p>
      </div>
    </div>
  </div>
</section>

<!-- Cafetaria List -->
<section id="cafeteria" class="py-5">
  <div class="container">
  <h2 class="mb-4">Beli</h2>
  <div class="row">
    <?php
    $query = mysqli_query($koneksi, "SELECT menu.*, kantin.nama AS nama_kantin FROM menu JOIN kantin ON menu.id_kantin = kantin.id");
    while($data = mysqli_fetch_array($query)) {
    ?>
    <div class="col-md-6 mb-4">
      <div class="card">
        <img src="img/<?= $data['gambar'] ?>" class="card-img-top img-fluid" style="object-fit: cover; height: 200px;" alt="<?= $data['nama'] ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $data['nama'] ?></h5>
          <p class="card-text">Rp<?= number_format($data['harga'], 0, ',', '.') ?> - <?= $data['nama_kantin'] ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  </div>
</section>

<!-- htb -->
<section id="htb" class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Beli</h2>
    <p class="lead">Pilihlah Makanan atau minuman yang tersedia!, Jangan lupa untuk dibayar ya</p>
    <form action="" method="post">
      <div class="mb-3">
        <label for="pilihmenu" class="form-label">Pilih Makanan/Minuman</label>
        <select name="menu_id" id="pilihmenu" class="form-select">
          <?php
          $menuQuery = mysqli_query($koneksi, "SELECT * from menu");
          while($menu = mysqli_fetch_array($menuQuery)) {
            echo "<option value ='{$menu['id']}'>{$menu['nama']} - Rp" . number_format($menu['harga'], 0, ',','.') . "(Stok: {$menu['stok']}) </option>";
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="number" class="form-control" value="1" min="1" id="jumlah" name="jumlah">
      </div>
      <button type="submit" name="pesan" class="btn btn-success">Pesan Sekarang</button>
    </form>
  </div>
</section>

<!-- Contact -->
<section id="contact" class="py-5">
  <div class="container">
    <h2 class="mb-4 text-center">Contact</h2>
    <form action="" method="get">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama:</label>
        <input type="text" name="nama" id="nama" class="form-control">
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <div class="mb-3">
        <label for="tarea" class="form-label">Pesan</label>
        <textarea name="tarea" id="message" cols="30" rows="10" class="form-control"></textarea>
      </div>
      <div class="mb-3">
        <button type="submit"  class="btn btn-success">Kirim Pesan!</button>
      </div>
    </form>
  </div>
</section>

<!-- Footer -->
<section>
  <footer class="bg-black text-center text-white py-3">
    <p>&copy; Abidzar Al-Ghifari || XI Tel 8</p>
  </footer>
</section>
