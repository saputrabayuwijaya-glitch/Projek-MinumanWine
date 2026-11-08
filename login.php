<?php  
session_start();  
include 'koneksi.php';  

if (isset($_POST['login'])) {  
    $username = $_POST['username'];  
    $password = md5($_POST['password']);  

    $query = mysqli_query($conn, "SELECT * FROM petugas  
        WHERE username='$username' AND password='$password'");  

    if (mysqli_num_rows($query) > 0) {  
        $_SESSION['login'] = true;  
        header("Location: home.php");  
        exit;  
    } else {  
        echo "<script>alert('Login gagal! Username atau password salah');</script>";  
    }  
}  
?>
<!doctype html>
<html lang="en">
<head>
    <title>Login | Berry Bros & Rudd</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        :root {
            --primary-color: #6b0f1a;
            --accent-color: #d4af37;
            --bg-dark: #121212;
            --glass-bg: rgba(255, 255, 255, 0.05);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            background-color: var(--bg-dark);
            background-image: linear-gradient(rgba(18, 18, 18, 0.8), rgba(18, 18, 18, 0.9)), 
                              url('https://images.unsplash.com/photo-1510626176961-4b57d4fbad03?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: 'Inter', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            overflow: hidden;
        }

        .login-card {
            background: var(--glass-bg);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid var(--glass-border);
            border-radius: 24px;
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.8s ease-out;
        }

        @keyframes slideUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            color: var(--accent-color);
            font-size: 2.5rem;
            text-align: center;
            margin-bottom: 0.5rem;
            letter-spacing: 1px;
        }

        .brand-subtitle {
            color: rgba(255, 255, 255, 0.5);
            text-align: center;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            margin-bottom: 2.5rem;
        }

        .form-label {
            color: rgba(255, 255, 255, 0.8);
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--glass-border);
            border-radius: 12px;
            color: white;
            padding: 0.8rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.07);
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(212, 175, 55, 0.15);
            outline: none;
            color: white;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #8d1624);
            border: none;
            border-radius: 12px;
            padding: 1rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px -5px rgba(107, 15, 26, 0.5);
            background: linear-gradient(135deg, #7e121f, #a71d2a);
        }

        .footer-text {
            text-align: center;
            margin-top: 2rem;
            color: rgba(255, 255, 255, 0.4);
            font-size: 0.85rem;
        }

        .footer-text a {
            color: var(--accent-color);
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .footer-text a:hover {
            color: white;
        }

        /* Responsive adjustments */
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">BBR</div>
        <div class="brand-subtitle">Fine Wine Management</div>
        
        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username" required>
            </div>
            
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
            </div>
            
            <div class="d-grid">
                <button type="submit" name="login" class="btn btn-primary">Sign In</button>
            </div>
        </form>

        <div class="footer-text">
            Forgot credentials? Please contact <a href="#">System Admin</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
