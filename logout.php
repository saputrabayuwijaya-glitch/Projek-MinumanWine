<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="3;url=index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out | BBR Systems</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-wine: #6b0f1a;
            --accent-gold: #d4af37;
            --bg-dark: #121212;
        }

        body {
            margin: 0;
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-dark);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            overflow: hidden;
        }

        .logout-container {
            text-align: center;
            padding: 3rem;
            max-width: 400px;
            animation: fadeIn 0.8s ease-out;
        }

        .brand-logo {
            font-family: 'Playfair Display', serif;
            color: var(--accent-gold);
            font-size: 2.5rem;
            margin-bottom: 0.5rem;
            letter-spacing: 2px;
        }

        .status-dot {
            width: 8px;
            height: 8px;
            background: var(--accent-gold);
            border-radius: 50%;
            display: inline-block;
            margin: 0 5px;
            animation: pulse 1.5s infinite ease-in-out;
        }

        .status-dot:nth-child(2) { animation-delay: 0.2s; }
        .status-dot:nth-child(3) { animation-delay: 0.4s; }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.3; }
            50% { transform: scale(1.5); opacity: 1; }
        }

        h2 {
            font-family: 'Playfair Display', serif;
            font-weight: 700;
            font-size: 1.5rem;
            margin: 2rem 0 1rem;
            letter-spacing: 1px;
        }

        p {
            color: rgba(255, 255, 255, 0.5);
            font-size: 0.9rem;
            font-weight: 400;
            line-height: 1.6;
        }

        .redirect-hint {
            margin-top: 3rem;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--accent-gold);
            opacity: 0.8;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="logout-container">
        <div class="brand-logo">BBR</div>
        
        <div>
            <span class="status-dot"></span>
            <span class="status-dot"></span>
            <span class="status-dot"></span>
        </div>

        <h2>Securely Signed Out</h2>
        <p>Your session has been terminated. Thank you for using the Berry Bros & Rudd Management System.</p>
        
        <div class="redirect-hint">
            Redirecting to Access Portal
        </div>
    </div>

</body>
</html>