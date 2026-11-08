<?php
include "../koneksi.php";
$id_penjualan = mysqli_real_escape_string($conn, $_GET['Id_Penjualan']);
$query = mysqli_query($conn, "SELECT * FROM detail_penjualan dp INNER JOIN produk p ON dp.Id_produk = p.Id_Produk INNER JOIN penjualan pj ON dp.Id_penjualan = pj.Id_Penjualan LEFT JOIN pelanggan pl ON pj.Id_Pelanggan = pl.Id_Pelanggan LEFT JOIN petugas pt ON pj.Id_Petugas = pt.Id_Petugas WHERE dp.Id_penjualan='$id_penjualan' ORDER BY dp.Id_penjualan, dp.Id_produk ASC");
$total = 0;
$header = mysqli_fetch_array(mysqli_query($conn, "SELECT pj.*,pl.Nama_Pelanggan,pl.ALAMAT,pt.Nama AS Nama_Petugas FROM penjualan pj LEFT JOIN pelanggan pl ON pj.Id_Pelanggan=pl.Id_Pelanggan LEFT JOIN petugas pt ON pj.Id_Petugas=pt.Id_Petugas WHERE pj.Id_Penjualan='$id_penjualan'"));
?>
<!doctype html>
<html lang="id">

<head>
  <title>Cetak Nota | BBR Wine System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;700&display=swap"
    rel="stylesheet">
  <style>
    :root {
      --wine: #6b0f1a;
      --gold: #d4af37;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: white;
      color: #1a1a2e;
    }

    .page {
      max-width: 750px;
      margin: 0 auto;
      background: white;
      border-radius: 0;
      overflow: hidden;
      box-shadow: none;
    }

    .receipt-header {
      background: linear-gradient(135deg, var(--wine), #2b0a0a);
      color: white;
      padding: 2.5rem 2rem;
    }

    .receipt-header .brand {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: var(--gold);
      letter-spacing: 4px;
    }

    .receipt-header .subtitle {
      font-size: 0.7rem;
      letter-spacing: 3px;
      text-transform: uppercase;
      color: rgba(255, 255, 255, 0.5);
      margin-top: 4px;
    }

    .receipt-header .divider {
      border: none;
      border-top: 1px solid rgba(255, 255, 255, 0.15);
      margin: 1.5rem 0;
    }

    .receipt-meta {
      display: flex;
      gap: 2rem;
      flex-wrap: wrap;
    }

    .receipt-meta .meta-item label {
      font-size: 0.65rem;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: rgba(255, 255, 255, 0.45);
      display: block;
    }

    .receipt-meta .meta-item span {
      font-size: 0.9rem;
      color: white;
      font-weight: 500;
    }

    .receipt-body {
      padding: 2rem;
    }

    .info-row {
      display: flex;
      gap: 2rem;
      margin-bottom: 1.5rem;
    }

    .info-box {
      flex: 1;
      background: #f8f9fa;
      border-radius: 10px;
      padding: 1rem 1.2rem;
    }

    .info-box label {
      font-size: 0.7rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: #888;
      display: block;
      margin-bottom: 4px;
    }

    .info-box span {
      font-size: 0.9rem;
      font-weight: 500;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 1rem;
      font-size: 0.85rem;
    }

    thead th {
      background: var(--wine);
      color: white;
      padding: 10px 12px;
      text-align: left;
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    tbody td {
      padding: 10px 12px;
      border-bottom: 1px solid #f0f0f0;
    }

    tbody tr:last-child td {
      border-bottom: none;
    }

    tbody tr:hover {
      background: rgba(212, 175, 55, 0.05);
    }

    .text-right {
      text-align: right;
    }

    .total-row {
      background: linear-gradient(135deg, var(--wine), #2b0a0a);
      color: white;
    }

    .total-row td {
      padding: 14px 12px;
      font-weight: 700;
      font-size: 1rem;
    }

    .receipt-footer {
      text-align: center;
      padding: 1.5rem 2rem;
      border-top: 1px solid #f0f0f0;
      color: #999;
      font-size: 0.78rem;
    }

    .btn-print {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: var(--wine);
      color: white;
      border: none;
      border-radius: 8px;
      padding: 8px 20px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      margin: 1rem;
    }

    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      background: #f0f0f0;
      color: #333;
      border: none;
      border-radius: 8px;
      padding: 8px 20px;
      font-size: 0.82rem;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      margin: 1rem;
    }

    .no-print {
      text-align: center;
      padding: 0;
      background: white;
      border-top: none;
      display: none;
    }

    @media print {
      * {
        background: white !important;
        color: black !important;
        box-shadow: none !important;
        border-radius: 0 !important;
      }

      body {
        background: white !important;
      }

      .no-print {
        display: none !important;
      }

      .page {
        box-shadow: none !important;
        margin: 0 !important;
        max-width: 100% !important;
      }

      .receipt-header {
        background: white !important;
        color: black !important;
        border-bottom: 2px solid black !important;
        padding: 1rem 2rem !important;
      }

      .receipt-header .brand {
        color: black !important;
      }

      .receipt-header .subtitle,
      .receipt-meta .meta-item label,
      .receipt-meta .meta-item span {
        color: black !important;
      }

      .receipt-header .divider {
        border-top: 1px solid black !important;
      }

      thead th {
        background: white !important;
        color: black !important;
        border-bottom: 2px solid black !important;
        border-top: 2px solid black !important;
      }

      tbody td {
        border-bottom: 1px solid #ccc !important;
        color: black !important;
      }

      .total-row {
        background: white !important;
        border-top: 2px solid black !important;
      }

      .total-row td {
        color: black !important;
        font-weight: bold !important;
      }

      .info-box {
        background: white !important;
        border: 1px solid #ccc !important;
      }

      .info-box label,
      .info-box span {
        color: black !important;
      }

      .receipt-footer {
        color: black !important;
        border-top: 1px solid #ccc !important;
      }
    }
  </style>
</head>

<body>
  <div class="page">
    <div class="receipt-header">
      <div class="brand">BBR</div>
      <div class="subtitle">Berry Bros &amp; Rudd · Fine Wine Management</div>
      <hr class="divider">
      <div class="receipt-meta">
        <div class="meta-item"><label>No. Invoice</label><span>#
            <?php echo $id_penjualan; ?>
          </span></div>
        <div class="meta-item">
          <label>Tanggal</label><span>
            <?php echo $header ? date('d F Y', strtotime($header['Tanggal_Pengiriman'])) : '-'; ?>
          </span>
        </div>
        <div class="meta-item"><label>Pembayaran</label><span>
            <?php echo $header['Metode_Pembayaran'] ?? '-'; ?>
          </span>
        </div>
        <div class="meta-item"><label>Pengiriman</label><span>
            <?php echo $header['Metode_Pengiriman'] ?? '-'; ?>
          </span>
        </div>
      </div>
    </div>
    <div class="receipt-body">
      <div class="info-row">
        <div class="info-box"><label>Nama Pelanggan</label><span>
            <?php echo $header['Nama_Pelanggan'] ?? '-'; ?>
          </span>
        </div>
        <div class="info-box"><label>Alamat</label><span>
            <?php echo $header['ALAMAT'] ?? '-'; ?>
          </span></div>
        <div class="info-box"><label>Petugas</label><span>
            <?php echo $header['Nama_Petugas'] ?? '-'; ?>
          </span></div>
      </div>
      <table>
        <thead>
          <tr>
            <th>Produk</th>
            <th>Deskripsi</th>
            <th class="text-right">Harga</th>
            <th class="text-right">Jumlah</th>
            <th class="text-right">Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php
          mysqli_data_seek($query, 0);
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
              <td class="text-right">Rp
                <?= number_format($data['Harga'], 0, ',', '.'); ?>
              </td>
              <td class="text-right">
                <?= $data['jumlah']; ?>
              </td>
              <td class="text-right">Rp
                <?= number_format($data['Sub_Total'], 0, ',', '.'); ?>
              </td>
            </tr>
          <?php } ?>
          <tr class="total-row">
            <td colspan="4" class="text-right">TOTAL PEMBAYARAN</td>
            <td class="text-right">Rp
              <?= number_format($total, 0, ',', '.'); ?>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="receipt-footer">
      Terima kasih telah berbelanja di Berry Bros &amp; Rudd · Dokumen ini dicetak pada
      <?php echo date('d/m/Y H:i'); ?>
    </div>
    <div class="no-print">
      <a href="penjualan-lihat.php" class="btn-back"><i>←</i> Kembali</a>
      <button onclick="window.print()" class="btn-print">🖨️ Cetak Nota</button>
    </div>
  </div>

  <script>
    window.addEventListener('load', function () {
      setTimeout(function () {
        window.print();
      }, 100);
    });
  </script>
</body>

</html>