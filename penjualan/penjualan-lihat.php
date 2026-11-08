<!doctype html>
<html lang="id">
<head>
  <title>Data Penjualan | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/shared.css">
</head>
<body>
<div class="">
  <!-- SIDEBAR -->
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
      <span class="font-weight-bold" style="font-size:0.9rem;">Data Penjualan</span>
    </div>
    <div class="page-header">
      <div class="page-header-left">
        <div class="section-badge"><i class="bi bi-receipt-cutoff"></i> Penjualan</div>
        <h2 class="page-title">Data Penjualan</h2>
        <p class="page-subtitle">Riwayat dan manajemen transaksi penjualan wine</p>
      </div>
      <a href="penjualan-tambah.php" class="btn-add"><i class="bi bi-plus-circle-fill"></i> Tambah Penjualan</a>
    </div>
    <div class="table-card">
      <table id="example" class="table table-hover" style="width:100%;">
        <thead>
          <tr>
            <th>ID Penjualan</th><th>Tanggal</th><th>Pelanggan</th><th>Petugas</th>
            <th>Pembayaran</th><th>Pengiriman</th><th class="text-right">Total</th>
            <th class="text-center">Aksi</th><th class="text-center">Info</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include '../koneksi.php';
          $query = mysqli_query($conn, "SELECT p.Id_Penjualan,p.Tanggal_Pengiriman,pl.Nama_Pelanggan,pt.Nama AS Nama_Petugas,p.Metode_Pembayaran,p.Metode_Pengiriman,p.Total_Jumlah FROM penjualan p LEFT JOIN pelanggan pl ON p.Id_Pelanggan=pl.Id_Pelanggan LEFT JOIN petugas pt ON p.Id_Petugas=pt.Id_Petugas ORDER BY p.Id_Penjualan DESC");
          while ($data = mysqli_fetch_array($query)) { ?>
          <tr>
            <td><?= $data['Id_Penjualan']; ?></td>
            <td><?= date('d/m/Y', strtotime($data['Tanggal_Pengiriman'])); ?></td>
            <td><?= $data['Nama_Pelanggan']; ?></td>
            <td><?= $data['Nama_Petugas']; ?></td>
            <td><?= $data['Metode_Pembayaran']; ?></td>
            <td><?= $data['Metode_Pengiriman']; ?></td>
            <td class="text-right">Rp <?= number_format($data['Total_Jumlah'],0,',','.'); ?></td>
            <td class="text-center" style="white-space:nowrap;">
              <a class="btn-action btn-edit" href="penjualan-ubah.php?Id_Penjualan=<?= $data['Id_Penjualan']; ?>"><i class="bi bi-pencil-fill"></i> Ubah</a>
              <a class="btn-action btn-delete" href="penjualan-hapus.php?Id_Penjualan=<?= $data['Id_Penjualan']; ?>" onclick="return confirm('Yakin hapus penjualan ini?')"><i class="bi bi-trash-fill"></i> Hapus</a>
            </td>
            <td class="text-center" style="white-space:nowrap;">
              <a class="btn-action btn-detail-act" href="penjualan-detail.php?Id_Penjualan=<?= $data['Id_Penjualan']; ?>"><i class="bi bi-eye-fill"></i> Detail</a>
              <a class="btn-action btn-print" href="penjualancetak.php?Id_Penjualan=<?= $data['Id_Penjualan']; ?>" target="_blank"><i class="bi bi-printer-fill"></i> Cetak</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
  $('#example').DataTable({ language: { search: "Cari:", lengthMenu: "Tampilkan _MENU_ data", info: "Menampilkan _START_ - _END_ dari _TOTAL_ data", paginate: { next: "Berikutnya", previous: "Sebelumnya" } } });
});
document.getElementById('sidebarToggle')?.addEventListener('click', function() {
  document.getElementById('sidebar').classList.toggle('open');
});
</script>
</body>
</html>