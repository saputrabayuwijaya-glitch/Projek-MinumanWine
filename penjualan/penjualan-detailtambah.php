<?php
include "../koneksi.php";
$id_penjualan_param = isset($_GET['Id_Penjualan']) ? $_GET['Id_Penjualan'] : '';
if (empty($id_penjualan_param)) {
  echo "<script>alert('ID Penjualan tidak ditemukan');window.location='penjualan-lihat.php';</script>";
  exit;
}
if (isset($_POST['simpan'])) {
  $id_penjualan = $_POST['id_penjualan'];
  $id_produk = $_POST['id_produk'];
  $jumlah = $_POST['jumlah'];
  $sub_total = $_POST['sub_total'];
  $query = mysqli_query($conn, "INSERT INTO detail_penjualan (Id_penjualan, Id_produk, jumlah, Sub_Total) VALUES('$id_penjualan','$id_produk','$jumlah','$sub_total')");
  if ($query) {
    echo "<script>alert('Data berhasil ditambahkan');window.location='penjualan-detail.php?Id_Penjualan=$id_penjualan';</script>";
  } else {
    echo "Gagal tambah data";
  }
}
?>
<!doctype html>
<html lang="id">

<head>
  <title>Tambah Detail Penjualan | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
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
          <li><a href="../petugas/petugas-lihat.php" class="menu-link"><i
                class="bi bi-shield-lock-fill"></i><span>Petugas</span></a></li>
          <li class="active"><a href="penjualan-lihat.php" class="menu-link"><i
                class="bi bi-receipt-cutoff"></i><span>Penjualan</span></a></li>
          <li><a href="../logout.php" class="menu-link logout"><i
                class="bi bi-box-arrow-right"></i><span>Logout</span></a></li>
        </ul>
        <div class="sidebar-footer">&copy; <?php echo date('Y'); ?> Berry Bros &amp; Rudd</div>
      </div>
    </nav>
    <div id="content">
      <div class="topbar-inner d-lg-none">
        <button class="btn-sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="font-weight-bold">Tambah Detail Penjualan</span>
      </div>
      <div class="page-header">
        <div class="page-header-left">
          <div class="section-badge"><i class="bi bi-receipt-cutoff"></i> Penjualan</div>
          <h2 class="page-title">Tambah Item Detail</h2>
          <p class="page-subtitle">Tambahkan produk ke dalam transaksi penjualan</p>
        </div>
      </div>
      <form method="POST">
        <div class="form-card">
          <div class="form-card-header">
            <div class="header-icon"><i class="bi bi-plus-square-fill"></i></div>
            <h4>Tambah Item Penjualan</h4>
            <p>Pilih produk dan masukkan jumlah pembelian</p>
          </div>
          <div class="form-group">
            <label class="form-label">ID Penjualan</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-hash"></i></span>
              <input type="text" class="form-control" name="id_penjualan"
                value="<?php echo htmlspecialchars($id_penjualan_param); ?>" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Pilih Produk</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-box-seam-fill"></i></span>
              <select name="id_produk" id="id_produk" class="form-control" required>
                <option value="">-- Pilih Produk --</option>
                <?php
                $queryproduk = mysqli_query($conn, "SELECT * FROM produk ORDER BY Deskripsi_Produk");
                while ($rowproduk = mysqli_fetch_array($queryproduk)) {
                  echo "<option value='" . $rowproduk['Id_Produk'] . "'>" . $rowproduk['Deskripsi_Produk'] . " (Rp " . number_format($rowproduk['Harga'], 0, ',', '.') . ")</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Jumlah</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-123"></i></span>
              <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" required>
            </div>
          </div>
          <div class="form-group">
            <label class="form-label">Sub Total (otomatis)</label>
            <div class="input-group">
              <span class="input-group-text"><i class="bi bi-currency-exchange"></i></span>
              <input type="number" class="form-control" name="sub_total" id="sub_total" readonly>
            </div>
          </div>
          <div class="d-flex justify-content-end" style="gap:10px; margin-top:1.5rem;">
            <a href="penjualan-detail.php?Id_Penjualan=<?php echo htmlspecialchars($id_penjualan_param); ?>"
              class="btn-action btn-delete" style="padding:9px 20px;"><i class="bi bi-arrow-left"></i> Kembali</a>
            <button type="submit" name="simpan" class="btn-add"><i class="bi bi-save-fill"></i> Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    const hargaProduk = {
      <?php
      $q = mysqli_query($conn, "SELECT Id_Produk, Harga FROM produk");
      while ($d = mysqli_fetch_assoc($q)) {
        echo "'" . $d['Id_Produk'] . "': " . $d['Harga'] . ",";
      }
      ?>};
    const produk = document.getElementById('id_produk');
    const jumlah = document.getElementById('jumlah');
    const subtotal = document.getElementById('sub_total');
    function hitungSubtotal() {
      let harga = hargaProduk[produk.value] || 0;
      subtotal.value = harga * (jumlah.value || 0);
    }
    produk.addEventListener('change', hitungSubtotal);
    jumlah.addEventListener('input', hitungSubtotal);
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('open');
    });
  </script>
</body>

</html>