<?php
if (isset($_POST['proses'])) {
  include '../koneksi.php';
  $Id_Pelanggan = $_POST['Id_Pelanggan'];
  $No_Akun = $_POST['No_Akun'];
  $Nama_Pelanggan = $_POST['Nama_Pelanggan'];
  $Pengiriman_Alamat = $_POST['Pengiriman_Alamat'];
  $ALAMAT = $_POST['ALAMAT'];
  mysqli_query($conn, "INSERT INTO pelanggan VALUES('$Id_Pelanggan','$No_Akun','$Nama_Pelanggan','$Pengiriman_Alamat','$ALAMAT')");
  header("location:pelanggan-lihat.php");
}
?>
<!doctype html>
<html lang="id">

<head>
  <title>Tambah Pelanggan | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
    rel="stylesheet">
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
          <li class="active"><a href="#" class="menu-link"><i class="bi bi-people-fill"></i><span>Pelanggan</span></a>
          </li>
          <li><a href="../produk/produk-lihat.php" class="menu-link"><i
                class="bi bi-box-seam-fill"></i><span>Produk</span></a></li>
          <li><a href="../petugas/petugas-lihat.php" class="menu-link"><i
                class="bi bi-shield-lock-fill"></i><span>Petugas</span></a></li>
          <li><a href="../penjualan/penjualan-lihat.php" class="menu-link"><i
                class="bi bi-receipt-cutoff"></i><span>Penjualan</span></a></li>
          <li><a href="../logout.php" class="menu-link logout"><i
                class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
        </ul>
        <div class="sidebar-footer">&copy; <?php echo date('Y'); ?> Berry Bros &amp; Rudd</div>
      </div>
    </nav>
    <div id="content">
      <div class="page-header">
        <div class="page-header-left">
          <div class="section-badge"><i class="bi bi-people-fill"></i> Pelanggan</div>
          <h2 class="page-title">Tambah Pelanggan Baru</h2>
          <p class="page-subtitle">Masukkan data pelanggan baru ke dalam sistem</p>
        </div>
      </div>
      <form action="" method="POST">
        <div class="form-card">
          <div class="form-card-header">
            <div class="header-icon"><i class="bi bi-person-plus-fill"></i></div>
            <h4>Tambah Pelanggan</h4>
            <p>Isi data pelanggan baru</p>
          </div>
          <div class="form-group">
            <label class="form-label">ID Pelanggan</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-hash"></i></span>
              <input type="text" name="Id_Pelanggan" class="form-control" placeholder="ID Pelanggan">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">No. Akun</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
              <input type="text" name="No_Akun" class="form-control" placeholder="No. Akun">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Nama Pelanggan</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="Nama_Pelanggan" class="form-control" placeholder="Nama Pelanggan">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Alamat Pengiriman</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-truck"></i></span>
              <input type="text" name="Pengiriman_Alamat" class="form-control" placeholder="Alamat Pengiriman">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Alamat</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-geo-alt-fill"></i></span>
              <input type="text" name="ALAMAT" class="form-control" placeholder="Alamat">
            </div>
          </div>
          <div class="d-flex justify-content-end" style="gap:10px; margin-top:1.5rem;">
            <a href="pelanggan-lihat.php" class="btn-action btn-delete" style="padding:9px 20px;"><i
                class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" name="proses" class="btn-add"><i class="bi bi-save-fill"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('open');
    });
  </script>
</body>

</html>