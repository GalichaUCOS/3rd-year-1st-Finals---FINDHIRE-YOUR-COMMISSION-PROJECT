<?php
session_start();
include_once 'handleForms.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    handleRegistration($username, $password, $role);
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FindHire - Register</title>
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
        .form-input input, .form-input select {
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
    <div class="register-page">
        <header class="register-header">
            <div class="register-header-content">
                <h1>FindHire</h1>
                <p>Create your account</p>
            </div>
        </header>

        <main class="register-main">
            <div class="register-container">
                <div class="register-box">
                    <form method="POST" class="register-form">
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
                                           autocomplete="new-password"
                                           required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-label">
                                    <label for="role">Select Role:</label>
                                </div>
                                <div class="form-input">
                                    <select id="role" name="role" required>
                                        <option value="" disabled selected>Choose your role</option>
                                        <option value="HR">HR Representative</option>
                                        <option value="Applicant">Applicant</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">
                                Create Account
                            </button>
                        </div>
                    </form>

                    <div class="register-footer">
                        <p>
                            Already have an account? 
                            <a href="login.php">Sign in here</a>
                        </p>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
