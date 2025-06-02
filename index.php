<!DOCTYPE html>

<?php include 'koneksi.php'; ?>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Booking Kantin SMK Telkom</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
    header {
      background: #900000;
      color: white;
      padding: 15px;
      position: relative;
    }
    nav ul {
      list-style: none;
      display: flex;
      gap: 20px;
      padding: 0;
    }
    nav ul li {
      display: inline;
    }
    nav ul li a {
      color: white;
      text-decoration: none;
    }
    section {
      padding: 20px;
      border-bottom: 1px solid #ccc;
    }
    footer {
      background: #ddd;
      text-align: center;
      padding: 10px;
    }
    img {
      margin: 10px 0;
    }
    form input,
    form textarea,
    form button {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 100%;
      max-width: 300px;
    }
    .logo-telkom {
      position: absolute;
      top: -10px;
      right: 10px;
      width: 80px;
      border-radius: 50%;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <header>
    <h1 style="margin: 10;">Booking Kantin SMK Telkom Jakarta</h1>
    <img src="https://3.bp.blogspot.com/-jNubSty8zTw/XIEg4j8Sc8I/AAAAAAAAauw/odKAXJj4FPcbjeA_NFnGcWwOup1_umWzwCLcBGAs/s1600/SMK%2BTelkom%2BJakarta.png" alt="Logo Telkom" class="logo-telkom" />
    <nav>
      <ul>
        <li><a href="#about">About Kantin</a></li>
        <li><a href="#list">Cafetaria List</a></li>
        <li><a href="#buy">How to Buy</a></li>
        <li><a href="#contact">Contact Us</a></li>
      </ul>
    </nav>
  </header>

  <!-- About Kantin -->
  <section id="about">
    <p>
      Kantin SMK Telkom Jakarta menyediakan makanan dan minuman berkualitas bagi siswa dengan harga terjangkau.
    </p>
    <video width="320" height="240" controls>
      <source src="https://3.bp.blogspot.com/-jNubSty8zTw/XIEg4j8Sc8I/AAAAAAAAauw/odKAXJj4FPcbjeA_NFnGcWwOup1_umWzwCLcBGAs/s1600/SMK%2BTelkom%2BJakarta.png" type="video/mp4" />
    </video>
  </section>

  <!-- Cafetaria List -->
  <section id="list">
    <h2>Daftar Kantin & Menu</h2>
    <div>
      <h3>Kantin Ibu Rika</h3>
      <ul>
        <li>
          Nasi Goreng - Rp10.000 <br />
          <img src="https://cdn1-production-images-kly.akamaized.net/EjwV7j3Y4JrlqUFuavke4NtRWtM=/1200x675/smart/filters:quality(75):strip_icc():format(jpeg)/kly-media-production/medias/3108566/original/079979700_1587487794-Sajiku_1.jpg" width="400" />
        </li>
        <li>
          Es Teh - Rp3.000 <br />
          <img src="https://fikes.almaata.ac.id/wp-content/uploads/2024/12/esteh.png" width="400" />
        </li>
        <li>
          Bakso - Rp12.000 <br />
          <img src="https://assets.unileversolutions.com/recipes-v2/245281.jpg" width="400" />
        </li>
        <li>
          Sosis Bakar - Rp5.000 <br />
          <img src="https://aslimasako.com/storage/post/new-title-13112024-070756.jpg" width="400" />
        </li>
      </ul>
    </div>
  </section>

  <!-- How to Buy -->
  <section id="buy">
    <h2>Cara Membeli</h2>
    <form id="orderForm">
      <label>Nasi Goreng (Rp10.000): Stok <span id="stokNasgor">10</span></label>
      <input type="number" id="nasgorQty" value="0" min="0" /><br />

      <label>Es Teh (Rp3.000): Stok <span id="stokEsteh">20</span></label>
      <input type="number" id="estehQty" value="0" min="0" /><br />

      <label>Bakso (Rp12.000): Stok <span id="stokBakso">15</span></label>
      <input type="number" id="baksoQty" value="0" min="0" /><br />

      <label>Sosis Bakar (Rp5.000): Stok <span id="stokSosis">25</span></label>
      <input type="number" id="sosisQty" value="0" min="0" /><br />

      <button type="button" onclick="hitungTotal()">Hitung Total & Tampilkan QR</button>
    </form>

    <p id="totalHarga"></p>
    <div id="qrSection" style="display: none">
      <p>Scan QR ini untuk bayar:</p>
      <img src="https://upload.wikimedia.org/wikipedia/commons/d/d0/QR_code_for_mobile_English_Wikipedia.svg" width="500" />
    </div>
  </section>

  <!-- Contact Us -->
  <section id="contact">
    <h2>Contact Us</h2>
    <form method="post" action="">
      <input type="text" name="nama" placeholder="Nama" required />
      <input type="text" name="telp" placeholder="No telp" required />
      <textarea name="pesan" placeholder="Pesan" required></textarea>
      <button type="submit">Kirim</button>
    </form>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 Dibuat oleh Arsha Achdi Siswa SMK Telkom Jakarta</p>
  </footer>

  <!-- Script -->
  <script>
    let stok = {
      nasgor: 10,
      esteh: 20,
      bakso: 15,
      sosis: 25,
    };

    function hitungTotal() {
      let nasgorQty = parseInt(document.getElementById("nasgorQty").value);
      let estehQty = parseInt(document.getElementById("estehQty").value);
      let baksoQty = parseInt(document.getElementById("baksoQty").value);
      let sosisQty = parseInt(document.getElementById("sosisQty").value);

      if (
        nasgorQty > stok.nasgor ||
        estehQty > stok.esteh ||
        baksoQty > stok.bakso ||
        sosisQty > stok.sosis
      ) {
        alert("Stok tidak mencukupi!");
        return;
      }

      let total =
        nasgorQty * 10000 +
        estehQty * 3000 +
        baksoQty * 12000 +
        sosisQty * 5000;

      document.getElementById("totalHarga").innerText =
        "Total Harga: Rp" + total.toLocaleString();

      // Update stok
      stok.nasgor -= nasgorQty;
      stok.esteh -= estehQty;
      stok.bakso -= baksoQty;
      stok.sosis -= sosisQty;

      document.getElementById("stokNasgor").innerText = stok.nasgor;
      document.getElementById("stokEsteh").innerText = stok.esteh;
      document.getElementById("stokBakso").innerText = stok.bakso;
      document.getElementById("stokSosis").innerText = stok.sosis;

      // Tampilkan QR jika ada total
      document.getElementById("qrSection").style.display = total > 0 ? "block" : "none";

      // Reset input
      document.getElementById("nasgorQty").value = 0;
      document.getElementById("estehQty").value = 0;
      document.getElementById("baksoQty").value = 0;
      document.getElementById("sosisQty").value = 0;
    }
  </script>

  <!-- PHP Proses Kirim Pesan -->
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = htmlspecialchars($_POST["nama"]);
    $telp = htmlspecialchars($_POST["telp"]);
    $pesan = htmlspecialchars($_POST["pesan"]);

    $data = "Nama: $nama\nNo Telp: $telp\nPesan: $pesan\n\n";
    file_put_contents("pemesanan.txt", $data, FILE_APPEND);

    echo "<script>alert('Pesan berhasil dikirim!');</script>";
  }
  ?>

</body>
</html>
