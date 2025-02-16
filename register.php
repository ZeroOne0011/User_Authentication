<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "usermanager";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (!isset($_SESSION["captcha"])) {
    if ($_SERVER["REQUEST_METHOD"] != "POST") { 
        $_SESSION["captcha"] = rand(100000, 999999);
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $captcha = $_POST['captcha'];



    if ($captcha != $_SESSION["captcha"]) {
        echo "<div class='alert alert-danger'>Incorrect CAPTCHA.</div>";
    } elseif (!preg_match('/^\d{6}$/', $pass)) {
        echo "<div class='alert alert-danger'>Password must be exactly 6 digits.</div>";
    } else {
        $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO userscathedrals (Username, User_Password) VALUES ('$user', '$hashed_pass')";

        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success'>User registered successfully!</div>";
            unset($_SESSION["captcha"]); 
        } else {
            echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>User Registration</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password (6 digits only)</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label>Captcha Code:</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['captcha']; ?>" readonly>
                <input type="text" class="form-control mt-2" name="captcha" placeholder="Enter CAPTCHA" required>
            </div>
            <button type="submit" class="btn btn-primary w-100" name="register">Register</button>
        </form><br>
        <a href="verify.php" class="btn btn-dark w-30 mt-3">Go to Verification</a>
    </div>
</body>
</html>
