<?php
// Handle form submission BEFORE any HTML is sent
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usersFile = '/var/users.json';

    // Grab form inputs
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Basic check
    if ($username === '' || $password === '') {
        header('Location: login.php?message=Please+enter+both+username+and+password');
        exit();
    }

    // Load users
    if (file_exists($usersFile)) {
        $data = json_decode(file_get_contents($usersFile), true);
        if (!is_array($data)) {
            $data = [];
        }
    } else {
        $data = [];
    }

    $foundUser = null;

    // Look for the user by username
    foreach ($data as $user) {
        if (isset($user['username']) && $user['username'] === $username) {
            $foundUser = $user;
            break;
        }
    }

    // If user found, verify password
    if ($foundUser && isset($foundUser['password']) && password_verify($password, $foundUser['password'])) {
        // Login success
        $_SESSION['username'] = $foundUser['username'];
        $_SESSION['email']    = $foundUser['email'] ?? '';

        header('Location: dashboard.php');
        exit();
    } else {
        // Login failed
        header('Location: login.php?message=Invalid+username+or+password');
        exit();
    }
}
?>

<?php include 'includes/header.php'; ?>

<h2>Login</h2>

<?php if (isset($_GET['message'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_GET['message']); ?></p>
<?php endif; ?>

<form action="login.php" method="POST">
    <label>Username:<br>
        <input type="text" name="username" required>
    </label><br><br>

    <label>Password:<br>
        <input type="password" name="password" required>
    </label><br><br>

    <button type="submit">Login</button>
</form>

<?php include 'includes/footer.php'; ?>

