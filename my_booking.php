<?php
session_start();
include "db.php";

// 🔐 Login check
if(!isset($_SESSION['user_id'])){
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$query = "SELECT * FROM bookings WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Bookings</title>
</head>
<body>

<h2>My Bookings</h2>

<table border="1" cellpadding="8">
<tr>
    <th>Name</th>
    <th>Event</th>
    <th>Date</th>
</tr>

<?php
if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['event']; ?></td>
    <td><?php echo $row['event_date']; ?></td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='3'>No bookings found</td></tr>";
}
?>

</table>

</body>
</html>
