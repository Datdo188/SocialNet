<?php
session_start();
include("db.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM account WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {

            $_SESSION['username'] = $user['username'];
            $_SESSION['fullname'] = $user['fullname'];

            header("Location: index.php");
            exit();

        } else {
            $error = "Wrong password";
        }

    } else {
        $error = "User not found";
    }
}
?>
<link rel="stylesheet" href="/socialnet/style.css">
<h2>Sign In</h2>

<form method="POST">

    Username:
    <input type="text" name="username"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <button type="submit">Sign In</button>

</form>

<p><?php echo $error; ?></p>
