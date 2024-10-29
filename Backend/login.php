<?php
// Include the database connection file
include 'db_connection.php';

// Initialize the session
session_start();

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        // Prepare a select statement
        $sql = "SELECT user_id, username, password FROM Users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = $username;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                // Check if username exists, if yes then verify password
                if ($stmt->num_rows == 1) {
                    // Bind result variables
                    $stmt->bind_result($user_id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            session_start();

                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $user_id;
                            $_SESSION["username"] = $username;

                            // Redirect user to welcome page
                            header("location: cities.php");
                            exit;
                        } else {
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid password.";
                        }
                    }
                } else {
                    // Username doesn't exist, display a generic error message
                    $username_err = "No account found with that username.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voyage</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="title">Voyage</div>
    <div class="subtitle">Explore a new age of travelling</div>
    <div class="signin">
        <div class="signup">Log In</div>
        <?php 
        if(!empty($login_err)){
            echo '<div class="error">' . $login_err . '</div>';
        }
        if(!empty($username_err)){
            echo '<div class="error">' . $username_err . '</div>';
        }
        if(!empty($password_err)){
            echo '<div class="error">' . $password_err . '</div>';
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <input type="text" id="username" name="username" placeholder="Username" required>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <button class="button1" type="submit">Log In</button>
            </div>
        </form>
        <a href="user_regis.php">
            <button class="button1">Sign Up?</button>
        </a>
    </div>
    <script src="script.js"></script>
</body>
</html>
