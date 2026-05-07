<?php
include("../socialnet/db.php");

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $fullname = $_POST['fullname'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO account(username, fullname, password)
            VALUES('$username', '$fullname', '$password')";

    if ($conn->query($sql) === TRUE) {
        $message = "User created!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<h2>Create User</h2>

<form method="POST">

    Username:
    <input type="text" name="username"><br><br>

    Fullname:
    <input type="text" name="fullname"><br><br>

    Password:
    <input type="password" name="password"><br><br>

    <button type="submit">Create</button>

</form>

<p><?php echo $message; ?></p>
