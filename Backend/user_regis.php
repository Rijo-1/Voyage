<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'db_connection.php';

// Define variables and initialize with empty values
$username = $email = $password = $age = $address = "";
$username_err = $email_err = $password_err = $age_err = $address_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate username
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter a username.";
    } else {
        // Prepare a select statement to check if the username already exists
        $sql = "SELECT user_id FROM users WHERE username = ?";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Store result
                $stmt->store_result();

                if ($stmt->num_rows == 1) {
                    $username_err = "This username is already taken.";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }

    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter an email.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email_err = "Invalid email format.";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter a password.";
    } elseif (strlen(trim($_POST["password"])) < 6) {
        $password_err = "Password must have at least 6 characters.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate age
    if (empty(trim($_POST["age"]))) {
        $age_err = "Please enter your age.";
    } elseif (!is_numeric(trim($_POST["age"])) || trim($_POST["age"]) < 0) {
        $age_err = "Please enter a valid age.";
    } else {
        $age = trim($_POST["age"]);
    }

    // Validate address
    if (empty(trim($_POST["address"]))) {
        $address_err = "Please enter your address.";
    } else {
        $address = trim($_POST["address"]);
    }

    // Check input errors before inserting into database
    if (empty($username_err) && empty($email_err) && empty($password_err) && empty($age_err) && empty($address_err)) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an insert statement
        $sql = "INSERT INTO Users (username, email, password, age, address) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("sssds", $param_username, $param_email, $param_password, $param_age, $param_address);

            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = $hashed_password; // Hashed password
            $param_age = $age;
            $param_address = $address;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Redirect to login page or success page
                header("location: login.php");
            } else {
                echo "Something went wrong. Please try again later.";
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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="title1">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-body-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href="hom"><h1 style="color: red;">Voyage</h1></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="homepage.html" style="color: white;">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: white;">Help</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: white;">About</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="credentials">
        <form action="user_regis.php" method="post">
            <div>
                <label for="username" style="color: white;">Name :</label>
                <input type="text" id="username" name="username" placeholder="Enter your name" required>
                <span style="color: red;"><?php echo $username_err; ?></span>
            </div>
            <div>
                <label for="age" style="color: white;">Age:</label>
                <input type="number" min="0" id="age" name="age" placeholder="Enter your Age" required>
                <span style="color: red;"><?php echo $age_err; ?></span>
            </div>
            <div>
                <label for="address" style="color: white;">Address :</label>
                <input type="text" id="address" name="address" placeholder="Enter your Address" required>
                <span style="color: red;"><?php echo $address_err; ?></span>
            </div>
            <div>
                <label for="email" style="color: white;">Email :</label>
                <input type="email" id="email" name="email" placeholder="Enter your Email" required>
                <span style="color: red;"><?php echo $email_err; ?></span>
            </div>
            <div>
                <label for="password" style="color: white;">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your Password" required>
                <span style="color: red;"><?php echo $password_err; ?></span>
            </div>
            <div>
                <input type="submit" value="Submit" class="submit btn btn-primary">
            </div>
        </form>
    </div>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <script src="script.js"></script>
</body>
</html>
