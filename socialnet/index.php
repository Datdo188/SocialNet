<?php
include("auth.php");
include("db.php");
include("navbar.php");

echo "<h2>Home Page</h2>";

echo "Username: " . $_SESSION['username'] . "<br>";
echo "Fullname: " . $_SESSION['fullname'] . "<br><br>";

$sql = "SELECT username, fullname FROM account";
$result = $conn->query($sql);

echo "<h3>Users</h3>";

while($row = $result->fetch_assoc()) {

    echo "<a href='profile.php?owner="
         . $row['username'] .
         "'>"
         . $row['fullname'] .
         "</a><br>";
}
?>
<link rel="stylesheet" href="/socialnet/style.css">
