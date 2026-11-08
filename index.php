<?php  
session_start();  
include 'koneksi.php';  

// Fetch featured products from the database
$products_query = mysqli_query($conn, "SELECT * FROM produk LIMIT 6");
?>
<!doctype html>
<html lang="en">
<head>
    <title>Berry Bros & Rudd | Fine Wine Merchants</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-wine: #6b0f1a;
            --accent-gold: #d4af37;
            --dark-charcoal: #121212;
            --light-cream: #f8f4f0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-charcoal);
            color: white;
            margin: 0;
            overflow-x: hidden;
        }

        h1, h2, h3, .brand-font {
            font-family: 'Playfair Display', serif;
        }

        /* --- NAVBAR --- */
        .navbar {
            padding: 1.5rem 2rem;
            transition: 0.4s;
            background: transparent;
            position: absolute;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar.scrolled {
            background: rgba(18, 18, 18, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
            position: fixed;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--accent-gold) !important;
            letter-spacing: 2px;
        }

        .nav-link {
            color: rgba(255, 255, 255, 0.8) !important;
            margin: 0 15px;
            font-weight: 400;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 1px;
            transition: 0.3s;
        }

        .nav-link:hover {
            color: var(--accent-gold) !important;
        }

        .btn-login {
            border: 1px solid var(--accent-gold);
            color: var(--accent-gold);
            padding: 8px 25px;
            border-radius: 50px;
            text-transform: uppercase;
            font-size: 0.8rem;
            font-weight: 600;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-login:hover {
            background: var(--accent-gold);
            color: var(--dark-charcoal);
        }

        /* --- HERO SECTION --- */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), 
                        url('https://images.unsplash.com/photo-1506377247377-2a5b3b0ca3ef?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 5rem;
            margin-bottom: 1rem;
            animation: fadeInUp 1s ease-out;
        }

        .hero-content p {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto 2rem;
            animation: fadeInUp 1.2s ease-out;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .hero-btn {
            padding: 15px 40px;
            border-radius: 0;
            background: var(--primary-wine);
            color: white;
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
        }

        .hero-btn:hover {
            background: #8d1624;
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
            color: white;
        }

        /* --- PRODUCTS SECTION --- */
        .section-padding {
            padding: 100px 0;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 3rem;
            color: var(--accent-gold);
            margin-bottom: 15px;
        }

        .section-title div {
            width: 80px;
            height: 2px;
            background: var(--accent-gold);
            margin: 0 auto;
        }

        .product-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.05);
            padding: 30px;
            transition: 0.4s;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .product-card:hover {
            background: rgba(255, 255, 255, 0.07);
            transform: translateY(-10px);
            border-color: var(--accent-gold);
        }

        .product-id {
            color: var(--accent-gold);
            font-size: 0.8rem;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .product-name {
            font-size: 1.5rem;
            margin-bottom: 15px;
        }

        .product-price {
            font-weight: 700;
            font-size: 1.2rem;
            color: white;
        }

        /* --- ABOUT SECTION --- */
        .about-section {
            background-color: #1a1a1a;
        }

        .about-img {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border: 1px solid var(--accent-gold);
            padding: 10px;
        }

        /* --- FOOTER --- */
        footer {
            background: #0a0a0a;
            padding: 80px 0 30px;
            border-top: 1px solid rgba(255,255,255,0.05);
        }

        .footer-brand {
            font-size: 2rem;
            color: var(--accent-gold);
            margin-bottom: 20px;
        }

        .footer-links h5 {
            color: var(--accent-gold);
            margin-bottom: 25px;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 2px;
        }

        .footer-links ul {
            list-style: none;
            padding: 0;
        }

        .footer-links ul li {
            margin-bottom: 12px;
        }

        .footer-links ul li a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            transition: 0.3s;
        }

        .footer-links ul li a:hover {
            color: white;
            padding-left: 5px;
        }

        .copyright {
            border-top: 1px solid rgba(255, 255, 255, 0.05);
            margin-top: 50px;
            padding-top: 30px;
            text-align: center;
            color: rgba(255, 255, 255, 0.3);
            font-size: 0.8rem;
        }

        /* Animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @media (max-width: 768px) {
            .hero-content h1 { font-size: 3rem; }
            .section-padding { padding: 60px 0; }
        }
    </style>
</head>
<body>

    <!-- NAVIGATION -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">BBR</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#collection">Collection</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Our Story</a></li>
                </ul>
                <div class="d-flex">
                    <a href="login.php" class="btn-login">Login Access</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="hero" id="home">
        <div class="container">
            <div class="hero-content">
                <p>ESTABLISHED 1698</p>
                <h1>Exquisite Fine Wines</h1>
                <p>Curating the world's most prestigious vintages for the discerning collector. A legacy of excellence in every bottle.</p>
                <a href="#collection" class="hero-btn">Explore Collection</a>
            </div>
        </div>
    </section>

    <!-- HIGHLIGHT SECTION -->
    <section class="section-padding" id="collection">
        <div class="container">
            <div class="section-title">
                <h2>The Collection</h2>
                <p class="text-white-50">Hand-selected highlights from our cellars</p>
                <div></div>
            </div>

            <div class="row g-4">
                <?php while($row = mysqli_fetch_assoc($products_query)): ?>
                <div class="col-lg-4 col-md-6">
                    <div class="product-card">
                        <div>
                            <div class="product-id"><?php echo $row['Id_Produk']; ?></div>
                            <h3 class="product-name"><?php echo $row['Deskripsi_Produk']; ?></h3>
                            <p class="text-white-50 small">Department: <?php echo $row['Dept']; ?></p>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <span class="product-price">$<?php echo number_format($row['Harga'], 2); ?></span>
                            <a href="#" class="text-white-50"><i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
            
            <div class="text-center mt-5">
                <a href="login.php" class="text-decoration-none" style="color: var(--accent-gold); letter-spacing: 2px;">VIEW FULL INVENTORY <i class="fas fa-long-arrow-alt-right ms-2"></i></a>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section class="section-padding about-section" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="https://images.unsplash.com/photo-1516594915697-87eb3b1c14ea?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Vineyard" class="about-img">
                </div>
                <div class="col-lg-6 ps-lg-5">
                    <h2 class="mb-4" style="font-size: 3rem;">A Legacy of Perfection</h2>
                    <p class="text-white-50 mb-4" style="line-height: 2;">Since 1698, Berry Bros & Rudd has been at the heart of the London wine trade. From our historic cellars at St James's Street, we have supplied the British Royal Family and connoisseurs globally with spirits and wines of unrivaled provenance.</p>
                    <p class="text-white-50 mb-5" style="line-height: 2;">Our values remain unchanged: to provide exceptional quality, expert advice, and a personal service that reflects the elegance of the wines we represent.</p>
                    <div class="row">
                        <div class="col-6">
                            <h3 class="h1 mb-0" style="color: var(--accent-gold);">300+</h3>
                            <p class="small text-uppercase letter-spacing-1">Years of Heritage</p>
                        </div>
                        <div class="col-6">
                            <h3 class="h1 mb-0" style="color: var(--accent-gold);">5000+</h3>
                            <p class="small text-uppercase letter-spacing-1">Rare Vintages</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="footer-brand brand-font">BBR</div>
                    <p class="text-white-50">3 St James's St, St. James's, London SW1A 1EG, United Kingdom</p>
                    <div class="mt-4">
                        <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                    <h5>Inventory</h5>
                    <ul>
                        <li><a href="#">Red Wines</a></li>
                        <li><a href="#">White Wines</a></li>
                        <li><a href="#">Champagne</a></li>
                        <li><a href="#">Spirits</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-4 mb-4 mb-md-0 footer-links">
                    <h5>Services</h5>
                    <ul>
                        <li><a href="#">Wine Storage</a></li>
                        <li><a href="#">Valuation</a></li>
                        <li><a href="#">Cellar Planning</a></li>
                        <li><a href="#">Fine Wine Exchange</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 footer-links">
                    <h5>Newsletter</h5>
                    <p class="text-white-50 small mb-4">Join our list for exclusive releases and private tastings.</p>
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Email Address" style="background: transparent; border: 1px solid rgba(255,255,255,0.1); color: white;">
                        <button class="btn" style="background: var(--accent-gold); color: black;" type="button">Subscribe</button>
                    </div>
                </div>
            </div>
            <div class="copyright">
                &copy; <?php echo date('Y'); ?> Berry Bros & Rudd. All Rights Reserved. Managed by BBR Systems.
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>