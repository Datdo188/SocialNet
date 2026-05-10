<?php
include("auth.php");
include("db.php");
include("navbar.php");

$username = $_SESSION['username'];

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $description = $_POST['description'];

    $sql = "UPDATE account
            SET description='$description'
            WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        $message = "Updated!";
    }
}

$sql = "SELECT description FROM account WHERE username='$username'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();
?>
<link rel="stylesheet" href="/socialnet/style.css">
<h2>Setting Page</h2>

<form method="POST">

<textarea name="description" rows="10" cols="50"><?php
echo $user['description'];
?></textarea>

<br><br>

<button type="submit">Save</button>

</form>

<p><?php echo $message; ?></p>
