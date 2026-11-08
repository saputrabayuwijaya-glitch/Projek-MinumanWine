<?php
include "../koneksi.php";

$id_penjualan = isset($_GET['Id_Penjualan']) ? mysqli_real_escape_string($conn, $_GET['Id_Penjualan']) : '';
$id_produk = isset($_GET['Id_produk']) ? mysqli_real_escape_string($conn, $_GET['Id_produk']) : '';

if (empty($id_penjualan) || empty($id_produk)) {
    echo "<script>alert('Parameter tidak valid');window.location='penjualan-lihat.php';</script>";
    exit;
}

$query = mysqli_query($conn, "DELETE FROM detail_penjualan WHERE Id_penjualan='$id_penjualan' AND Id_produk='$id_produk'");

if ($query) {
    echo "<script>alert('Data berhasil dihapus');window.location='penjualan-detail.php?Id_Penjualan=$id_penjualan';</script>";
} else {
    echo "Hapus gagal: " . mysqli_error($conn);
}
?>