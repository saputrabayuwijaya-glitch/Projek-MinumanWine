<?php
include '../koneksi.php';
$query = mysqli_query($conn, "SELECT * FROM petugas WHERE Id_Petugas = '$_GET[Id_Petugas]'");
$data = mysqli_fetch_array($query);
if (isset($_POST['proses'])) {
  $Id_Petugas = $_GET['Id_Petugas'];
  $Nama = $_POST['Nama'];
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  mysqli_query($conn, "UPDATE petugas SET Nama='$Nama',username='$username',password='$password' WHERE Id_Petugas='$Id_Petugas'");
  header("location:petugas-lihat.php");
}
?>
<!doctype html>
<html lang="id">

<head>
  <title>Ubah Petugas | BBR Wine System</title>
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
          <li><a href="../pelanggan/pelanggan-lihat.php" class="menu-link"><i
                class="bi bi-people-fill"></i><span>Pelanggan</span></a></li>
          <li><a href="../produk/produk-lihat.php" class="menu-link"><i
                class="bi bi-box-seam-fill"></i><span>Produk</span></a></li>
          <li class="active"><a href="#" class="menu-link"><i
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
          <div class="section-badge"><i class="bi bi-shield-lock-fill"></i> Petugas</div>
          <h2 class="page-title">Ubah Data Petugas</h2>
          <p class="page-subtitle">Edit informasi akun petugas yang ada</p>
        </div>
      </div>
      <form action="" method="POST">
        <div class="form-card">
          <div class="form-card-header">
            <div class="header-icon"><i class="bi bi-pencil-square"></i></div>
            <h4>Ubah Data Petugas</h4>
            <p>Edit informasi akun petugas</p>
          </div>
          <div class="form-group">
            <label class="form-label">ID Petugas</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-hash"></i></span>
              <input type="text" name="Id_Petugas" value="<?php echo $data['Id_Petugas'] ?>" class="form-control"
                readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Nama Lengkap</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
              <input type="text" name="Nama" value="<?php echo $data['Nama'] ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Username</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-person-badge-fill"></i></span>
              <input type="text" name="username" value="<?php echo $data['username'] ?>" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Password Baru</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
              <input type="password" name="password" class="form-control" placeholder="Kosongkan jika tidak diubah">
            </div>
          </div>
          <div class="d-flex justify-content-end" style="gap:10px; margin-top:1.5rem;">
            <a href="petugas-lihat.php" class="btn-action btn-delete" style="padding:9px 20px;"><i
                class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" name="proses" class="btn-add"><i class="bi bi-check-circle-fill"></i> Simpan
              Perubahan</button>
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