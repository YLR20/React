<?php
session_start();

// Check if the user is already logged in, redirect to the dashboard if so
if (isset($_SESSION['user'])) {
    header('Location: dashboard.php');
    exit();
}

// Define valid username and password (replace with database validation)
$validUsername = 'user123';
$validPassword = 'password123';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Basic validation: Check if username and password match the valid credentials
    if ($username === $validUsername && $password === $validPassword) {
        // Set a session variable to mark the user as logged in
        $_SESSION['user'] = $username;
        
        // Redirect to the dashboard or any other protected page
        header('Location: dashboard.php');
        exit();
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Community Website</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <!-- Header content goes here -->
    </header>

    <main>
        <div class="login-container">
            <h2>Login to Your Account</h2>
            <?php
            if (isset($error)) {
                echo '<p class="error-message">' . $error . '</p>';
            }
            ?>
            <form id="login-form" action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="cta-button">Login</button>
            </form>
        </div>
    </main>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <script src="script.js"></script>
</body>
</html>
