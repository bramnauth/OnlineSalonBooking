<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GlowSalon | Online Booking Appointment System</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f7f3ff; /* very light purple background */
        }

        header {
            background: linear-gradient(135deg, #e0c3fc, #f5d0fe); /* soft purple gradient */
            padding: 20px 10px 15px 10px;
            text-align: center;
            color: #3e3e3e;
            box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        }

        .brand-title {
            font-size: 28px;
            font-weight: bold;
            letter-spacing: 1px;
            margin: 0;
        }

        .brand-subtitle {
            font-size: 16px;
            margin: 4px 0 15px 0;
            color: #5a3d7a;
        }

        nav {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            color: #3e3e3e;
            font-size: 15px;
            padding: 6px 12px;
            border-radius: 20px;
            background-color: rgba(255, 255, 255, 0.6);
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        nav a:hover {
            background-color: #d9b3ff;
            transform: translateY(-1px);
        }

        main {
            max-width: 1000px;
            margin: 20px auto 40px auto;
            padding: 0 15px 20px 15px;
        }
    </style>
</head>
<body>
<header>
    <h1 class="brand-title">GlowSalon</h1>
    <p class="brand-subtitle">Online Booking Appointment System</p>

    <nav>
        <a href="index.php">Home</a>
        <a href="technicians.php">Technicians</a>
        <a href="services.php">Services</a>
        <a href="generalinfo.php">General Information</a>
    </nav>
</header>

<main>

