<?php
// Handle the form submission BEFORE any HTML output
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Path to users.json (same folder as this file)
    $usersFile = '/var/users.json';

    // Load existing users, or start with an empty array
    if (file_exists($usersFile)) {
        $data = json_decode(file_get_contents($usersFile), true);
        if (!is_array($data)) {
            $data = [];
        }
    } else {
        $data = [];
    }

    // Get form values (and trim whitespace)
    $full_name = trim($_POST['full_name'] ?? '');
    $username  = trim($_POST['username'] ?? '');
    $password  = $_POST['password'] ?? '';
    $email     = trim($_POST['email'] ?? '');
    $phone     = trim($_POST['phone'] ?? '');

    // Basic validation: make sure nothing is empty
    if ($full_name === '' || $username === '' || $password === '' || $email === '' || $phone === '') {
        header('Location: register.php?message=Please+fill+in+all+fields');
        exit();
    }

    // Check if username already exists
    foreach ($data as $user) {
        if (isset($user['username']) && $user['username'] === $username) {
            header('Location: register.php?message=Username+already+exists');
            exit();
        }
    }

    // Hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Add the new user
    $data[] = [
        'full_name' => $full_name,
        'username'  => $username,
        'email'     => $email,
        'password'  => $hashedPassword,
        'phone'     => $phone
    ];

    // Save back to users.json
    file_put_contents($usersFile, json_encode($data, JSON_PRETTY_PRINT));

    // Log the user in (store in session)
    $_SESSION['username'] = $username;
    $_SESSION['email']    = $email;

    // Send them to their dashboard
    header('Location: dashboard.php');
    exit();
}
?>

<?php include 'includes/header.php'; ?>

<h2>Registration</h2>

<?php if (isset($_GET['message'])): ?>
    <p style="color:red;"><?php echo htmlspecialchars($_GET['message']); ?></p>
<?php endif; ?>

<form action="register.php" method="POST">
    <label>Full Name:<br>
        <input type="text" name="full_name" required>
    </label><br><br>

    <label>Username:<br>
        <input type="text" name="username" required>
    </label><br><br>

    <label>Password:<br>
        <input type="password" name="password" required>
    </label><br><br>

    <label>Email:<br>
        <input type="email" name="email" required>
    </label><br><br>

    <label>Phone Number:<br>
        <input type="text" name="phone" required>
    </label><br><br>

    <button type="submit">Register</button>
</form>

<?php include 'includes/footer.php'; ?>

