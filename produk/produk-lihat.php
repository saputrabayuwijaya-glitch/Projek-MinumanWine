<!doctype html>
<html lang="id">

<head>
  <title>Data Produk | BBR Wine System</title>
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
          <li><a href="../pelanggan/pelanggan-lihat.php" class="menu-link"><i
                class="bi bi-people-fill"></i><span>Pelanggan</span></a></li>
          <li class="active"><a href="#" class="menu-link"><i class="bi bi-box-seam-fill"></i><span>Produk</span></a>
          </li>
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
      <div class="topbar-inner d-lg-none">
        <button class="btn-sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="font-weight-bold" style="font-size:0.9rem;">Data Produk</span>
      </div>
      <div class="page-header">
        <div class="page-header-left">
          <div class="section-badge"><i class="bi bi-box-seam-fill"></i> Produk</div>
          <h2 class="page-title">Data Produk Wine</h2>
          <p class="page-subtitle">Kelola inventaris produk wine Berry Bros &amp; Rudd</p>
        </div>
        <a href="produk-tambah.php" class="btn-add"><i class="bi bi-plus-circle-fill"></i> Tambah Produk</a>
      </div>
      <div class="table-card">
        <table id="example" class="table table-hover" style="width:100%;">
          <thead>
            <tr>
              <th>ID Produk</th>
              <th>Deskripsi Produk</th>
              <th>Harga</th>
              <th>Dept</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            include '../koneksi.php';
            $query = mysqli_query($conn, "SELECT * FROM produk");
            while ($data = mysqli_fetch_array($query)) { ?>
              <tr>
                <td><?php echo $data['Id_Produk']; ?></td>
                <td><?php echo $data['Deskripsi_Produk']; ?></td>
                <td>Rp <?php echo number_format($data['Harga'], 0, ',', '.'); ?></td>
                <td><?php echo $data['Dept']; ?></td>
                <td class="text-center" style="white-space:nowrap;">
                  <a class="btn-action btn-edit" href="produk-ubah.php?Id_Produk=<?php echo $data['Id_Produk']; ?>"><i
                      class="bi bi-pencil-fill"></i> Ubah</a>
                  <a class="btn-action btn-delete" href="produk-hapus.php?Id_Produk=<?php echo $data['Id_Produk']; ?>"
                    onclick="return confirm('Yakin ingin hapus produk ini?')"><i class="bi bi-trash-fill"></i> Hapus</a>
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
    $(document).ready(function () {
      $('#example').DataTable({ language: { search: "Cari:", lengthMenu: "Tampilkan _MENU_ data", info: "Menampilkan _START_ - _END_ dari _TOTAL_ data", paginate: { next: "Berikutnya", previous: "Sebelumnya" } } });
    });
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('open');
    });
  </script>
</body>

</html>