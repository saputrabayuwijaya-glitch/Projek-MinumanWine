<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM penjualan WHERE Id_Penjualan = '$_GET[Id_Penjualan]'");
$data = mysqli_fetch_array($query);
$pelanggan = mysqli_query($conn, "SELECT * FROM pelanggan");
$petugas = mysqli_query($conn, "SELECT * FROM petugas");
if (isset($_POST['proses'])) {
  $Id_Penjualan = $_GET['Id_Penjualan'];
  $Id_Pelanggan = $_POST['Id_Pelanggan'];
  $Id_Petugas = $_POST['Id_Petugas'];
  $Metode_Pembayaran = $_POST['Metode_Pembayaran'];
  $Metode_Pengiriman = $_POST['Metode_Pengiriman'];
  $Total_Jumlah = $_POST['Total_Jumlah'];
  $Tanggal_Pengiriman = $_POST['Tanggal_Pengiriman'];
  mysqli_query($conn, "UPDATE penjualan SET Id_Pelanggan='$Id_Pelanggan',Id_Petugas='$Id_Petugas',Metode_Pembayaran='$Metode_Pembayaran',Metode_Pengiriman='$Metode_Pengiriman',Total_Jumlah='$Total_Jumlah',Tanggal_Pengiriman='$Tanggal_Pengiriman' WHERE Id_Penjualan='$Id_Penjualan'");
  header("location:penjualan-lihat.php");
}
?>
<!doctype html>
<html lang="id">
<head>
  <title>Ubah Penjualan | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/shared.css">
</head>
<body>
<div class="">
  <nav id="sidebar">
    <div class="sidebar-inner">
      <div class="sidebar-logo-wrap">
        <div class="sidebar-wine-img" style="background-image: url(../images/wine.jpg);"></div>
        <a href="../home.php" class="sidebar-brand">BBR</a>
        <div class="sidebar-tagline">Fine Wine Management System</div>
      </div>
      <ul class="sidebar-nav">
        <li><a href="../home.php" class="menu-link"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a></li>
        <li><a href="../pelanggan/pelanggan-lihat.php" class="menu-link"><i class="bi bi-people-fill"></i><span>Pelanggan</span></a></li>
        <li><a href="../produk/produk-lihat.php" class="menu-link"><i class="bi bi-box-seam-fill"></i><span>Produk</span></a></li>
        <li><a href="../petugas/petugas-lihat.php" class="menu-link"><i class="bi bi-shield-lock-fill"></i><span>Petugas</span></a></li>
        <li class="active"><a href="#" class="menu-link"><i class="bi bi-receipt-cutoff"></i><span>Penjualan</span></a></li>
        <li><a href="../logout.php" class="menu-link logout"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
      </ul>
      <div class="sidebar-footer">&copy; <?php echo date('Y'); ?> Berry Bros &amp; Rudd</div>
    </div>
  </nav>
  <div id="content">
    <div class="topbar-inner d-lg-none">
      <button class="btn-sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
      <span class="font-weight-bold">Ubah Penjualan</span>
    </div>
    <div class="page-header">
      <div class="page-header-left">
        <div class="section-badge"><i class="bi bi-receipt-cutoff"></i> Penjualan</div>
        <h2 class="page-title">Ubah Data Penjualan</h2>
        <p class="page-subtitle">Edit informasi transaksi penjualan yang ada</p>
      </div>
    </div>
    <form action="" method="POST">
    <div class="form-card">
      <div class="form-card-header">
        <div class="header-icon"><i class="bi bi-pencil-square"></i></div>
        <h4>Edit Data Penjualan</h4>
        <p>Perbarui informasi transaksi penjualan</p>
      </div>
      <div class="form-group">
        <label class="form-label">ID Penjualan</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-hash"></i></span>
          <input type="text" value="<?php echo $data['Id_Penjualan'] ?>" class="form-control" readonly>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Pelanggan</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-people-fill"></i></span>
          <select name="Id_Pelanggan" class="form-control">
            <?php while($p = mysqli_fetch_array($pelanggan)): ?>
            <option value="<?= $p['Id_Pelanggan'] ?>" <?= $p['Id_Pelanggan']==$data['Id_Pelanggan']?'selected':'' ?>><?= $p['Nama_Pelanggan'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Petugas</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
          <select name="Id_Petugas" class="form-control">
            <?php while($pt = mysqli_fetch_array($petugas)): ?>
            <option value="<?= $pt['Id_Petugas'] ?>" <?= $pt['Id_Petugas']==$data['Id_Petugas']?'selected':'' ?>><?= $pt['Nama'] ?></option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Metode Pembayaran</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-credit-card-fill"></i></span>
          <input type="text" name="Metode_Pembayaran" value="<?php echo $data['Metode_Pembayaran'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Metode Pengiriman</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-truck-fill"></i></span>
          <input type="text" name="Metode_Pengiriman" value="<?php echo $data['Metode_Pengiriman'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Total Jumlah (Rp)</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-currency-exchange"></i></span>
          <input type="number" name="Total_Jumlah" value="<?php echo $data['Total_Jumlah'] ?>" class="form-control">
        </div>
      </div>
      <div class="form-group">
        <label class="form-label">Tanggal Pengiriman</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-calendar-fill"></i></span>
          <input type="date" name="Tanggal_Pengiriman" value="<?php echo $data['Tanggal_Pengiriman'] ?>" class="form-control">
        </div>
      </div>
      <div class="d-flex justify-content-end" style="gap:10px; margin-top:1.5rem;">
        <a href="penjualan-lihat.php" class="btn-action btn-delete" style="padding:9px 20px;"><i class="bi bi-arrow-left"></i> Kembali</a>
        <button type="submit" name="proses" class="btn-add"><i class="bi bi-check-circle-fill"></i> Simpan Perubahan</button>
      </div>
    </div>
    </form>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.getElementById('sidebarToggle')?.addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('open');
});
</script>
</body>
</html>