<?php include 'includes/header.php'; ?>

<style>
    .home-container {
        width: 100%;
        max-width: 550px;
        margin: 40px auto 50px auto;
        padding: 25px 20px 30px 20px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        text-align: center;
    }

    .home-container h2 {
        margin-top: 0;
        color: #3e3e3e;
    }

    .home-text {
        color: #555;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .home-actions {
        display: flex;
        justify-content: center;
        gap: 15px;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .home-button {
        display: inline-block;
        padding: 10px 20px;
        border-radius: 20px;
        text-decoration: none;
        border: none;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
        background-color: #c2185b;
        color: #ffffff;
        transition: background-color 0.2s ease, transform 0.1s ease;
    }

    .home-button:hover {
        background-color: #ad1457;
        transform: translateY(-1px);
    }

    .home-button.secondary {
        background-color: #f3e5f5;
        color: #4a148c;
    }

    .home-button.secondary:hover {
        background-color: #e1bee7;
    }

    #message {
        margin-top: 15px;
        font-size: 14px;
        color: green;
    }
</style>

<div class="home-container">
    <h2>Welcome to GlowSalon</h2>

    <p class="home-text">
        GlowSalon’s Online Booking Appointment System lets you schedule facials, massages,
        manicures, pedicures, and more with your favorite technicians.
        <br><br>
        To book an appointment, you’ll need to create an account and log in.
    </p>

    <?php

    $loggedInUsername = $_SESSION['username'] ?? null;
    ?>

    <?php if (!$loggedInUsername): ?>
        <div class="home-actions">
            <a class="home-button" href="register.php">Register</a>
            <a class="home-button secondary" href="login.php">Login</a>
        </div>
    <?php else: ?>
        <p class="home-text">
            You are currently logged in as
            <strong><?php echo htmlspecialchars($loggedInUsername); ?></strong>.
        </p>
        <div class="home-actions">
            <a class="home-button" href="dashboard.php">Go to Dashboard</a>
            <a class="home-button secondary" href="logout.php">Logout</a>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['message'])): ?>
        <p id="message"><?php echo htmlspecialchars($_GET['message']); ?></p>
    <?php endif; ?>
</div>

<?php include 'includes/footer.php'; ?>
