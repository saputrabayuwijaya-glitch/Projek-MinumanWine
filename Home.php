<?php  
session_start();  
include 'koneksi.php';

if (!isset($_SESSION['login'])) {  
    header("Location: index.php");  
    exit;  
}

// Fetch counts for dashboard stats
$res_pelanggan = mysqli_query($conn, "SELECT COUNT(*) AS total FROM pelanggan");
$cnt_pelanggan = mysqli_fetch_assoc($res_pelanggan)['total'];

$res_produk = mysqli_query($conn, "SELECT COUNT(*) AS total FROM produk");
$cnt_produk = mysqli_fetch_assoc($res_produk)['total'];

$res_petugas = mysqli_query($conn, "SELECT COUNT(*) AS total FROM petugas");
$cnt_petugas = mysqli_fetch_assoc($res_petugas)['total'];
?>
<!doctype html>
<html lang="en">
<head>
    <title>Dashboard | BBR Systems</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/shared.css">

    <style>
        :root {
            --sidebar-bg: #0f0f0f;
            --sidebar-width: 260px;
            --primary-wine: #6b0f1a;
            --accent-gold: #d4af37;
            --content-bg: #f8f9fa;
            --card-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--content-bg);
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar handled by shared.css */
        /* --- MAIN CONTENT --- */
        #main-content {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: all 0.3s ease;
            position: relative;
        }

        /* --- TOPBAR --- */
        .topbar {
            height: 70px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
            border-bottom: 1px solid #eee;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .page-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin: 0;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 38px;
            height: 38px;
            background: var(--primary-wine);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
        }

        /* --- DASHBOARD CONTENT --- */
        .dashboard-container {
            padding: 2rem;
        }

        .welcome-sec {
            margin-bottom: 2rem;
        }

        .welcome-sec h2 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #1a1a1a;
            margin-bottom: 5px;
        }

        .welcome-sec p {
            color: #888;
            font-size: 0.95rem;
        }

        /* --- STAT CARDS --- */
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            border: none;
            box-shadow: var(--card-shadow);
            transition: transform 0.3s;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-icon.bg-wine { background: rgba(107, 15, 26, 0.1); color: var(--primary-wine); }
        .stat-icon.bg-gold { background: rgba(212, 175, 55, 0.1); color: var(--accent-gold); }
        .stat-icon.bg-blue { background: rgba(13, 110, 253, 0.1); color: #0d6efd; }

        .stat-label {
            font-size: 0.85rem;
            color: #888;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: #333;
            margin: 5px 0 0;
        }

        /* --- RECENT TABLE --- */
        .content-card {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: var(--card-shadow);
            margin-top: 2rem;
        }

        .card-header-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .card-header-flex h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin: 0;
            color: #333;
        }

        /* Responsive sidebar toggle */
        @media (max-width: 992px) {
            #sidebar { left: -260px; }
            #sidebar.active { left: 0; }
            #main-content { margin-left: 0; }
            #main-content.active { margin-left: var(--sidebar-width); }
        }
    </style>
</head>
<body>

    <!-- SIDEBAR (Unified Design) -->
    <aside id="sidebar">
        <div class="sidebar-inner">
          <div class="sidebar-logo-wrap">
            <a href="home.php" class="sidebar-brand">BBR</a>
            <div class="sidebar-tagline">Fine Wine Management System</div>
          </div>
          <ul class="sidebar-nav">
            <li class="active">
              <a href="home.php" class="menu-link"><i class="bi bi-grid-1x2-fill"></i><span>Dashboard</span></a>
            </li>
            <li>
              <a href="pelanggan/pelanggan-lihat.php" class="menu-link"><i class="bi bi-people-fill"></i><span>Pelanggan</span></a>
            </li>
            <li>
              <a href="produk/produk-lihat.php" class="menu-link"><i class="bi bi-box-seam-fill"></i><span>Produk</span></a>
            </li>
            <li>
              <a href="petugas/petugas-lihat.php" class="menu-link"><i class="bi bi-shield-lock-fill"></i><span>Petugas</span></a>
            </li>
            <li>
              <a href="penjualan/penjualan-lihat.php" class="menu-link"><i class="bi bi-receipt-cutoff"></i><span>Penjualan</span></a>
            </li>
            <li>
              <a href="logout.php" class="menu-link logout"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>
            </li>
          </ul>
          <div class="sidebar-footer">&copy; <?php echo date('Y'); ?> Berry Bros &amp; Rudd</div>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <main id="main-content">
        
        <!-- TOPBAR -->
        <header class="topbar">
           <div class="d-flex align-items-center gap-3">

    <!-- TOGGLE SIDEBAR MOBILE -->
    <button id="sidebarCollapse"
            class="btn btn-light d-lg-none shadow-sm"
            style="border-radius:10px;">
        <i class="bi bi-list"></i>
    </button>


    <!-- PAGE TITLE AREA -->
    <div>

        <div class="d-flex align-items-center gap-2">

            <i class="fa-solid fa-wine-glass text-danger"
               style="font-size:20px;"></i>

            <h1 class="page-title m-0"
                style="
                font-weight:700;
                letter-spacing:0.5px;">
                Penjualan Wine
            </h1>

            <span class="badge"
                  style="
                  background:rgba(212,175,55,0.15);
                  color:#b8962e;
                  font-size:11px;
                  font-weight:600;
                  border-radius:20px;
                  padding:5px 10px;">
                  Dashboard
            </span>

        </div>


        <!-- SUBTITLE -->
        <div style="
            font-size:12px;
            color:#888;
            margin-top:2px;">
            Berry Bros & Rudd Management System
        </div>

    </div>

</div>
            <div class="user-profile dropdown">

    <div class="d-flex align-items-center gap-3 dropdown-toggle"
         role="button"
         data-bs-toggle="dropdown"
         aria-expanded="false"
         style="cursor:pointer;">

        <div class="text-end d-none d-md-block">
            <div class="fw-bold small text-dark">
                Saputra Bayu Wijaya
            </div>

            <div class="small px-2 py-1 mt-1"
                 style="
                 font-size:11px;
                 border-radius:20px;
                 background:rgba(212,175,55,0.15);
                 color:#b8962e;
                 font-weight:600;
                 display:inline-block;">
                 Administrator
            </div>
        </div>

        <div class="user-avatar shadow-sm"
             style="
             width:42px;
             height:42px;
             background:linear-gradient(135deg,#6b0f1a,#d4af37);
             font-size:15px;">
             SBW
        </div>

    </div>


    <!-- DROPDOWN MENU -->
    <ul class="dropdown-menu dropdown-menu-end shadow border-0 rounded-4 mt-3">

        <li>
            <a class="dropdown-item py-2" href="#">
                <i class="bi bi-person-circle me-2"></i>
                Profile Saya
            </a>
        </li>

        <li>
            <a class="dropdown-item py-2" href="#">
                <i class="bi bi-gear me-2"></i>
                Pengaturan
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item text-danger py-2" href="logout.php">
                <i class="bi bi-box-arrow-right me-2"></i>
                Logout
            </a>
        </li>

    </ul>

</div>
        </header>

        <!-- DASHBOARD CONTAINER -->
        <div class="dashboard-container">
            
          <div class="welcome-sec">
    <div class="p-5 rounded-4 position-relative overflow-hidden"
         style="background: linear-gradient(120deg, #6b0f1a, #2b0a0a); color:white;">

        <div class="row align-items-center">
            
            <!-- TEXT AREA -->
            <div class="col-lg-7">
                <h2 style="font-weight:800; font-size:2rem;">
                    Welcome wine lovers 🍷
                </h2>

                <p style="opacity:0.85; font-size:0.95rem; max-width:600px;">
                    Sistem manajemen Berry Bros & Rudd membantu Anda mengelola distribusi wine premium 
                    secara efisien dan terintegrasi. Pantau data pelanggan, stok produk, serta aktivitas 
                    petugas dalam satu dashboard modern dan profesional.
                </p>

                <div class="mt-3">
                    <a href="produk/produk-lihat.php"
                       class="btn btn-light btn-sm px-4 py-2"
                       style="border-radius:10px; font-weight:600;">
                        Kelola Produk Wine
                    </a>

                    <a href="pelanggan/pelanggan-lihat.php"
                       class="btn btn-outline-light btn-sm px-4 py-2 ms-2"
                       style="border-radius:10px;">
                        Lihat Data Pelanggan
                    </a>
                </div>
            </div>

            <!-- ICON AREA -->
            <div class="col-lg-5 d-none d-lg-block text-end">
                <i class="fa-solid fa-wine-glass"
                   style="font-size:120px; opacity:0.15;"></i>
            </div>

        </div>

    </div>
</div>

            <!-- STATS GRID -->
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon bg-wine">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="stat-label">Jumlah Pelanggan Yang memesan Wine</div>
                        <h3 class="stat-value"><?php echo number_format($cnt_pelanggan); ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon bg-gold">
                            <i class="bi bi-box-seam"></i>
                        </div>
                        <div class="stat-label">Jumlah Barang Wine</div>
                        <h3 class="stat-value"><?php echo number_format($cnt_produk); ?></h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stat-card">
                        <div class="stat-icon bg-blue">
                            <i class="bi bi-person-badge"></i>
                        </div>
                        <div class="stat-label">Jumlah Petugas</div>
                        <h3 class="stat-value"><?php echo number_format($cnt_petugas); ?></h3>
                    </div>
                </div>
            </div>

            <!-- RECENT OVERVIEW -->
            <div class="content-card">
                <div class="card-header-flex">
                    <h3>System Overview</h3>
                    <a href="produk/produk-lihat.php" class="btn btn-sm btn-outline-dark" style="font-size: 0.8rem; border-radius: 8px;">Lihat Produk Wine lainnya</a>
                </div>
                
                <div class="row items-center justify-center p-5 text-center">
                    <div class="col-12">
                        <img src="https://images.unsplash.com/photo-1547595628-c61a29f496f0?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Wine Cellar" style="width: 100%; max-width: 500px; border-radius: 20px; box-shadow: 0 20px 40px rgba(0,0,0,0.1);">
                        <p class="mt-4 text-muted mx-auto" style="max-width: 600px;">The Berry Bros & Rudd management system provides a centralized control plane for your fine wine distribution network. Use the lateral navigation to manage customers, stock levels, and personnel access.</p>
                    </div>
                </div>
            </div>

        </div>

    </main>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('sidebarCollapse').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('main-content').classList.toggle('active');
        });
    </script>
</body>
</html>
