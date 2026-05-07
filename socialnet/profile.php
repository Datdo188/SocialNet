<?php
include("auth.php");
include("db.php");
include("navbar.php");

if (isset($_GET['owner'])) {
    $owner = $_GET['owner'];
} else {
    $owner = $_SESSION['username'];
}

$sql = "SELECT * FROM account WHERE username='$owner'";
$result = $conn->query($sql);

$user = $result->fetch_assoc();
?>

<h2>Profile Page</h2>

Username: <?php echo $user['username']; ?><br>
Fullname: <?php echo $user['fullname']; ?><br>

<h3>Description</h3>

<p>
<?php echo $user['description']; ?>
</p>
