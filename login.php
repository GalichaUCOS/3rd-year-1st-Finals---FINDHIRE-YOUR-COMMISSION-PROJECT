<?php
session_start();
include_once 'handleForms.php';

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    // Redirect the logged-in user to the appropriate dashboard
    header("Location: " . ($_SESSION['user']['role'] == 'HR' ? 'hr_dashboard.php' : 'applicant_dashboard.php'));
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user = handleLogin($username, $password);
    
    if ($user) {
        $_SESSION['user'] = $user;
        header("Location: " . ($user['role'] == 'HR' ? 'hr_dashboard.php' : 'applicant_dashboard.php'));
        exit();
    } else {
        $error = "Invalid credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindHire - Login</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .form-table {
            display: table;
            width: 100%;
            margin-top: 1rem;
        }
        .form-row {
            display: table-row;
        }
        .form-label, .form-input {
            display: table-cell;
            padding: 0.5rem;
            vertical-align: middle;
        }
        .form-label {
            width: 30%;
            font-weight: bold;
            text-align: right;
        }
        .form-input input {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-actions {
            text-align: center;
            margin-top: 1rem;
        }
        .form-actions button {
            padding: 0.7rem 1.5rem;
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-actions button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <header class="login-header">
            <div class="login-header-content">
                <h1>FindHire</h1>
                <p>Sign in to your account</p>
            </div>
        </header>

        <main class="login-main">
            <div class="login-container">
                <div class="login-box">
                    <?php if (isset($error)): ?>
                        <div class="alert alert-error" role="alert">
                            <?php echo $error; ?>
                        </div>
                    <?php endif; ?>

                    <form method="POST" class="login-form">
                        <div class="form-table">
                            <div class="form-row">
                                <div class="form-label">
                                    <label for="username">Username:</label>
                                </div>
                                <div class="form-input">
                                    <input type="text" 
                                           id="username" 
                                           name="username" 
                                           placeholder="Enter your username"
                                           autocomplete="username"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-label">
                                    <label for="password">Password:</label>
                                </div>
                                <div class="form-input">
                                    <input type="password" 
                                           id="password" 
                                           name="password" 
                                           placeholder="Enter your password"
                                           autocomplete="current-password"
                                           required>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                Sign In
                            </button>
                        </div>
                    </form>

                    <div class="login-footer">
                        <p>
                            Don't have an account? 
                            <a href="register.php">Create Account</a>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
