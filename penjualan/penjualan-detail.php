<?php
include "../koneksi.php";
if (!isset($_GET['Id_Penjualan']) || empty($_GET['Id_Penjualan'])) {
  echo "<script>alert('ID Penjualan tidak ditemukan');window.location='penjualan-lihat.php';</script>";
  exit;
}
$id_penjualan = mysqli_real_escape_string($conn, $_GET['Id_Penjualan']);

// Ambil info header: penjualan + pelanggan + petugas
$query_header = mysqli_query($conn, "SELECT pj.*, pl.Nama_Pelanggan, pt.Nama AS Nama_Petugas FROM penjualan pj LEFT JOIN pelanggan pl ON pj.Id_Pelanggan = pl.Id_Pelanggan LEFT JOIN petugas pt ON pj.Id_Petugas = pt.Id_Petugas WHERE pj.Id_Penjualan = '$id_penjualan' LIMIT 1");
$header = mysqli_fetch_assoc($query_header);

// Ambil detail item
$query = mysqli_query($conn, "SELECT * FROM detail_penjualan dp INNER JOIN produk p ON dp.Id_produk = p.Id_Produk INNER JOIN penjualan pj ON dp.Id_penjualan = pj.Id_Penjualan WHERE dp.Id_penjualan='$id_penjualan' ORDER BY dp.Id_penjualan, dp.Id_produk ASC");
$total = 0;
?>
<!doctype html>
<html lang="id">

<head>
  <title>Detail Penjualan | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../css/shared.css">
  <style>
    /* ── Info Card ─────────────────────────────────────────── */
    .info-card {
      background: #fff;
      border-radius: 14px;
      box-shadow: 0 2px 12px rgba(107, 15, 26, 0.08);
      padding: 28px 32px 20px;
      margin-bottom: 24px;
    }

    .info-card .info-card-title {
      font-family: 'Playfair Display', serif;
      font-size: 1rem;
      font-weight: 700;
      color: #6b0f1a;
      text-transform: uppercase;
      letter-spacing: 1.5px;
      margin-bottom: 20px;
      padding-bottom: 10px;
      border-bottom: 2px solid #f3e8ea;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .info-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 18px 32px;
    }

    .info-field label {
      font-size: 0.7rem;
      font-weight: 600;
      color: #9e9e9e;
      text-transform: uppercase;
      letter-spacing: 1px;
      margin-bottom: 5px;
      display: block;
    }

    .info-field .info-value {
      background: #f8f3f4;
      border: 1.5px solid #f0e4e6;
      border-radius: 8px;
      padding: 9px 14px;
      font-size: 0.93rem;
      font-weight: 500;
      color: #2d1a1e;
      min-height: 40px;
      display: flex;
      align-items: center;
    }

    .info-field .info-value.id-badge {
      font-family: 'Courier New', monospace;
      font-weight: 700;
      color: #6b0f1a;
      background: #fdf0f2;
      border-color: #e8c0c8;
    }
  </style>
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
        <div class="sidebar-footer">&copy;
          <?php echo date('Y'); ?> Berry Bros &amp; Rudd
        </div>
      </div>
    </nav>

    <div id="content">
      <div class="topbar-inner d-lg-none">
        <button class="btn-sidebar-toggle" id="sidebarToggle"><i class="bi bi-list"></i></button>
        <span class="font-weight-bold">Detail Penjualan</span>
      </div>

      <!-- Page Header -->
      <div class="page-header">
        <div class="page-header-left">
          <div class="section-badge"><i class="bi bi-receipt-cutoff"></i> Penjualan</div>
          <h2 class="page-title">Detail Penjualan</h2>
          <p class="page-subtitle">ID Transaksi:
            <?php echo htmlspecialchars($id_penjualan); ?>
          </p>
        </div>
        <div style="display:flex; gap:10px;">
          <a href="penjualan-detailtambah.php?Id_Penjualan=<?php echo htmlspecialchars($id_penjualan); ?>"
            class="btn-add">
            <i class="bi bi-plus-circle-fill"></i> Tambah Item
          </a>
          <a href="penjualan-lihat.php" class="btn-action btn-detail-act" style="padding:9px 20px;">
            <i class="bi bi-arrow-left"></i> Kembali
          </a>
        </div>
      </div>

      <!-- ── INFO CARD: Header Transaksi ─────────────────── -->
      <div class="info-card">
        <div class="info-card-title">
          <i class="bi bi-file-earmark-text-fill"></i> Informasi Transaksi
        </div>
        <div class="info-grid">

          <div class="info-field">
            <label>ID Penjualan</label>
            <div class="info-value id-badge">
              <?php echo htmlspecialchars($id_penjualan); ?>
            </div>
          </div>

          <div class="info-field">
            <label>Tanggal</label>
            <div class="info-value">
              <?php
              // Sesuaikan nama kolom tanggal dengan database Anda (misal: Tanggal / tanggal / created_at)
              $tgl = $header['Tanggal_Pengiriman'] ?? '-';
              echo $tgl !== '-' ? date('d/m/Y', strtotime($tgl)) : '-';
              ?>
            </div>
          </div>

          <div class="info-field">
            <label>Pelanggan</label>
            <div class="info-value">
              <?php echo htmlspecialchars($header['Nama_Pelanggan'] ?? '-'); ?>
            </div>
          </div>

          <div class="info-field">
            <label>Kasir / Petugas</label>
            <div class="info-value">
              <?php echo htmlspecialchars($header['Nama_Petugas'] ?? $header['Nama'] ?? '-'); ?>
            </div>
          </div>

          <div class="info-field">
            <label>Metode Pembayaran</label>
            <div class="info-value">
              <?php echo htmlspecialchars($header['Metode_Pembayaran'] ?? '-'); ?>
            </div>
          </div>

          <div class="info-field">
            <label>Metode Pengiriman</label>
            <div class="info-value">
              <?php echo htmlspecialchars($header['Metode_Pengiriman'] ?? '-'); ?>
            </div>
          </div>

        </div>
      </div>
      <!-- ── END INFO CARD ───────────────────────────────── -->

      <!-- Tabel Detail -->
      <div class="table-card">
        <table id="example" class="table table-hover" style="width:100%;">
          <thead>
            <tr>
              <th>ID Produk</th>
              <th>Deskripsi</th>
              <th>Harga</th>
              <th>Jumlah</th>
              <th>Subtotal</th>
              <th>Pembayaran</th>
              <th>Pengiriman</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query) > 0) {
              while ($data = mysqli_fetch_array($query)) {
                $total += $data['Sub_Total'];
                ?>
                <tr>
                  <td>
                    <?= $data['Id_produk']; ?>
                  </td>
                  <td>
                    <?= $data['Deskripsi_Produk']; ?>
                  </td>
                  <td>Rp
                    <?= number_format($data['Harga'], 0, ',', '.'); ?>
                  </td>
                  <td><span class="section-badge">
                      <?= $data['jumlah']; ?>
                    </span></td>
                  <td style="color:#198754; font-weight:600;">Rp
                    <?= number_format($data['Sub_Total'], 0, ',', '.'); ?>
                  </td>
                  <td>
                    <?= $data['Metode_Pembayaran']; ?>
                  </td>
                  <td>
                    <?= $data['Metode_Pengiriman']; ?>
                  </td>
                  <td class="text-center" style="white-space:nowrap;">
                    <a class="btn-action btn-edit"
                      href="penjualan-detailubah.php?Id_produk=<?= $data['Id_produk']; ?>&Id_Penjualan=<?= $id_penjualan; ?>">
                      <i class="bi bi-pencil-fill"></i> Ubah
                    </a>
                    <a class="btn-action btn-delete"
                      href="penjualan-detailhapus.php?Id_produk=<?= $data['Id_produk']; ?>&Id_Penjualan=<?= $id_penjualan; ?>"
                      onclick="return confirm('Yakin hapus item ini?')">
                      <i class="bi bi-trash-fill"></i> Hapus
                    </a>
                  </td>
                </tr>
              <?php }
            } else { ?>
              <tr>
                <td colspan="8" class="text-center text-muted py-4">Belum ada item dalam penjualan ini.</td>
              </tr>
            <?php } ?>
          </tbody>
        </table>

        <!-- TOTAL BOX -->
        <div class="d-flex justify-content-end mt-3">
          <div
            style="background:linear-gradient(135deg,#6b0f1a,#8d1624); color:white; border-radius:12px; padding:16px 28px; font-size:1.1rem; font-weight:700; min-width:260px; text-align:right;">
            <span
              style="opacity:0.75; font-size:0.75rem; display:block; text-transform:uppercase; letter-spacing:1px;">Total
              Transaksi</span>
            Rp
            <?php echo number_format($total, 0, ',', '.'); ?>
          </div>
        </div>
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
      if ($('#example').length) {
        $('#example').DataTable({
          language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            paginate: { next: "Berikutnya", previous: "Sebelumnya" }
          }
        });
      }
    });
    document.getElementById('sidebarToggle')?.addEventListener('click', function () {
      document.getElementById('sidebar').classList.toggle('open');
    });
  </script>
</body>

</html>