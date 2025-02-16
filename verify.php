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
    $_SESSION["captcha"] = rand(100000, 999999);

    
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $captcha = $_POST['captcha'];



    if ($captcha != $_SESSION["captcha"]) {
        echo "<div class='alert alert-danger'>Incorrect CAPTCHA.</div>";
    } else {
        $sql = "SELECT User_Password FROM userscathedrals WHERE Username = '$user'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($pass, $row['User_Password'])) {
                echo "<div class='alert alert-success'>User exists, and password is correct!</div>";
            } else {
                echo "<div class='alert alert-danger'>Incorrect password.</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>User does not exist.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Verify User</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="mb-3">
                <label>Captcha Code:</label>
                <input type="text" class="form-control" value="<?php echo $_SESSION['captcha']; ?>" readonly>
                <input type="text" class="form-control mt-2" name="captcha" placeholder="Enter CAPTCHA" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="verify">Verify User</button>
        </form><br>
        <a href="register.php" class="btn btn-dark w-30 mt-3">Go to Registration</a>
    </div>
</body>
</html>
