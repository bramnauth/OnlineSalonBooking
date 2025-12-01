<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If not logged in, send to login
if (!isset($_SESSION['username'])) {
    header('Location: login.php?message=Please+log+in+first');
    exit();
}

$usersFile = '/var/users.json';

// Load users
if (file_exists($usersFile)) {
    $data = json_decode(file_get_contents($usersFile), true);
    if (!is_array($data)) {
        $data = [];
    }
} else {
    $data = [];
}

$loggedInUsername   = $_SESSION['username'];
$currentUserIndex   = null;
$currentUser        = null;

// Find the current user in users.json
foreach ($data as $index => $user) {
    if (isset($user['username']) && $user['username'] === $loggedInUsername) {
        $currentUserIndex = $index;
        $currentUser      = $user;
        break;
    }
}

// Default profile values
$full_name = $currentUser['full_name'] ?? '';
$email     = $currentUser['email'] ?? ($_SESSION['email'] ?? '');
$phone     = $currentUser['phone'] ?? '';

$profileMessage      = '';
$appointmentMessage  = '';

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $formType = $_POST['form_type'] ?? '';

    // Update profile form
    if ($formType === 'profile' && $currentUserIndex !== null) {
        $full_name = trim($_POST['full_name'] ?? '');
        $email     = trim($_POST['email'] ?? '');
        $phone     = trim($_POST['phone'] ?? '');

        if ($full_name === '' || $email === '' || $phone === '') {
            $profileMessage = 'Please fill in all fields before updating your profile.';
        } else {
            // Update in data array
            $data[$currentUserIndex]['full_name'] = $full_name;
            $data[$currentUserIndex]['email']     = $email;
            $data[$currentUserIndex]['phone']     = $phone;

            // Save to users.json
            file_put_contents($usersFile, json_encode($data, JSON_PRETTY_PRINT));

            // Update local + session
            $currentUser        = $data[$currentUserIndex];
            $_SESSION['email']  = $email;
            $profileMessage     = 'Your profile has been updated successfully.';
        }
    }

    // Appointment request form
    if ($formType === 'appointment') {
        $date = $_POST['appointment_date'] ?? '';
        $time = $_POST['appointment_time'] ?? '';

        if ($date !== '' && $time !== '') {
            $appointmentMessage =
                'You have requested an appointment for ' .
                htmlspecialchars(date('F j, Y', strtotime($date))) .
                ' at ' . htmlspecialchars($time) . '.';
        } else {
            $appointmentMessage = 'Please select both a date and a time.';
        }
    }
}
?>

<?php include 'includes/header.php'; ?>

<style>
    .dashboard-section {
        margin-bottom: 30px;
        padding: 15px 15px 20px 15px;
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.05);
    }

    .dashboard-section h2,
    .dashboard-section h3 {
        margin-top: 0;
        color: #3e3e3e;
    }

    .profile-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
        background-color: #fff;
        box-shadow: 0 2px 6px rgba(0,0,0,0.03);
    }

    .profile-table th,
    .profile-table td {
        border: 1px solid #ddd;
        padding: 8px 10px;
        text-align: left;
        vertical-align: middle;
    }

    .profile-table th {
        background-color: #e1bee7; /* light purple header */
        color: #3e3e3e;
        font-size: 15px;
    }

    .profile-label {
        width: 30%;
        font-weight: bold;
        background-color: #f3e5f5;
    }

    .profile-table tr:nth-child(even) td:not(.profile-label) {
        background-color: #fdf1f7; /* very light pink/purple */
    }

    .dashboard-input {
        width: 95%;
        padding: 6px 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    .dashboard-button {
        margin-top: 10px;
        padding: 8px 16px;
        background-color: #c2185b;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 14px;
        font-weight: 600;
    }

    .dashboard-button:hover {
        background-color: #ad1457;
    }

    .small-note {
        font-size: 12px;
        color: #777;
        margin-top: 4px;
    }

    .success-message {
        color: green;
        margin-top: 8px;
        font-size: 14px;
    }

    .error-message {
        color: red;
        margin-top: 8px;
        font-size: 14px;
    }
</style>

<h2>Dashboard</h2>

<!-- CLIENT PROFILE SECTION -->
<div class="dashboard-section">
    <h3>Client Profile</h3>

    <form action="dashboard.php" method="POST">
        <input type="hidden" name="form_type" value="profile">

        <table class="profile-table">
            <tr>
                <th>Field</th>
                <th>Details</th>
            </tr>
            <tr>
                <td class="profile-label">Name</td>
                <td>
                    <input type="text" name="full_name" class="dashboard-input"
                           value="<?php echo htmlspecialchars($full_name); ?>" required>
                </td>
            </tr>
            <tr>
                <td class="profile-label">Username</td>
                <td>
                    <input type="text" class="dashboard-input"
                           value="<?php echo htmlspecialchars($loggedInUsername); ?>" disabled>
                    <div class="small-note">Username cannot be changed.</div>
                </td>
            </tr>
            <tr>
                <td class="profile-label">Email</td>
                <td>
                    <input type="email" name="email" class="dashboard-input"
                           value="<?php echo htmlspecialchars($email); ?>" required>
                </td>
            </tr>
            <tr>
                <td class="profile-label">Phone Number</td>
                <td>
                    <input type="text" name="phone" class="dashboard-input"
                           value="<?php echo htmlspecialchars($phone); ?>" required>
                </td>
            </tr>
        </table>

        <button type="submit" class="dashboard-button">Update Profile</button>

        <?php if ($profileMessage): ?>
            <p class="<?php echo (strpos($profileMessage, 'successfully') !== false) ? 'success-message' : 'error-message'; ?>">
                <?php echo htmlspecialchars($profileMessage); ?>
            </p>
        <?php endif; ?>
    </form>
</div>

<!-- UPCOMING APPOINTMENTS SECTION -->
<div class="dashboard-section">
    <h3>Upcoming Appointments</h3>
    <p>No Appointments Scheduled.</p>
</div>

<!-- REQUEST APPOINTMENT SECTION -->
<div class="dashboard-section">
    <h3>Request Appointment</h3>

    <form action="dashboard.php" method="POST">
        <input type="hidden" name="form_type" value="appointment">

        <p>
            <label for="appointment_date"><strong>Date:</strong></label><br>
            <input type="date" name="appointment_date" id="appointment_date" class="dashboard-input" required>
        </p>

        <p>
            <label for="appointment_time"><strong>Preferred Time:</strong></label><br>
            <select name="appointment_time" id="appointment_time" class="dashboard-input" required>
                <?php
                // 30-minute slots from 9:00 AM to 5:00 PM
                $start = strtotime('10:00');
                $end   = strtotime('19:00');
                while ($start <= $end) {
                    $slot = date('g:i A', $start);
                    echo '<option value="' . $slot . '">' . $slot . '</option>';
                    $start = strtotime('+30 minutes', $start);
                }
                ?>
            </select>
        </p>

        <button type="submit" class="dashboard-button">Request Appointment</button>
    </form>

    <?php if ($appointmentMessage): ?>
        <p class="success-message" style="margin-top: 12px;">
            <?php echo $appointmentMessage; ?><br>
            You will receive a call to confirm once the appointment is approved by a technician.<br>
            Your appointment will also be displayed above, under the Upcoming Appointments section once confirmed.
        </p>
    <?php else: ?>
        <p class="small-note">
            After you request an appointment, we will notify you of the requested date and time and
            call to confirm once it is approved by a technician.
        </p>
    <?php endif; ?>

    <p class="small-note">
        For further information, reach out to us by visiting the
        <a href="generalinfo.php">General Information</a> page.
    </p>
</div>

<!-- PAST APPOINTMENTS SECTION -->
<div class="dashboard-section">
    <h3>Past Appointments &amp; Services</h3>
    <p>No past appointments yet.</p>
</div>

<!-- LOGOUT BUTTON AT BOTTOM -->
<div class="logout-wrapper">
    <a href="logout.php" class="dashboard-button">Logout</a>
</div>

<?php include 'includes/footer.php'; ?>


