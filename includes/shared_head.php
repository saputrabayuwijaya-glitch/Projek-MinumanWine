<?php
// shared_head.php - Digunakan oleh semua halaman dalam
// Parameter: $page_title, $active_menu
?>
<!doctype html>
<html lang="id">
<head>
  <title><?php echo isset($page_title) ? $page_title . ' | BBR Wine System' : 'BBR Wine System'; ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Bootstrap 4 + Icons -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">

  <!-- Shared CSS - design system seragam -->
  <link rel="stylesheet" href="<?php echo isset($depth) && $depth === 1 ? '../' : ''; ?>css/shared.css">
</head>
