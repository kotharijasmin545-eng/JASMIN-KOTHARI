<?php
session_start();
include "db.php";

// LOGIN CHECK
if(!isset($_SESSION['user'])){
    header("Location: user_login.php");
    exit();
}

// ✅ USER ID FROM SESSION
$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Birthday Venue</title>
    <link rel="stylesheet" href="venue.css">
</head>
<body>

<h2 class="title">🎂 Select Birthday Party Venue</h2>

<div class="venue-container">
    <label class="venue-card">
        <input type="radio" name="venue" value="Hotel">
        <img src="images/img14.jpg">
        <p>Luxury Hotel</p>
    </label>
    <label class="venue-card">
        <input type="radio" name="venue" value="Cafe">
        <img src="images/banner.jpg">
        <p>Party Cafe</p>
    </label>
    <label class="venue-card">
        <input type="radio" name="venue" value="Banquet Hall">
        <img src="images/birthday.jpg">
        <p>Banquet Hall</p>
    </label>
</div>

<div class="action-buttons">
    <a href="dashbord.php"><button class="back-btn">Back</button></a>
    <a href="book_event.php?event=Birthday" class="next-btn">Booking</a>
</div>

<h2 style="text-align:center;">Your Birthday Event Bookings</h2>

<table border="1" width="90%" align="center" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>City</th>
    <th>Date</th>
    <th>Email</th>
    <th>Mobile</th>
</tr>

<?php
// ✅ ONLY LOGGED-IN USER DATA
$sql = "SELECT * FROM bookings 
        WHERE event_type='Birthday' 
        AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['surname']." ".$row['name']; ?></td>
    <td><?php echo $row['city']; ?></td>
    <td><?php echo $row['event_date']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['mobile']; ?></td>

     <td>
        <a href="update_booking.php?id=<?php echo $row['id']; ?>">
            <button style="background:blue;color:white;padding:6px 12px;border:none;border-radius:5px;">
                ✏ Update
            </button>
        </a>
    </td>
</tr>
<?php
    }
} else {
    echo "<tr><td colspan='6' align='center'>No Booking Found</td></tr>";
}
?>

</table>

<br>
<center>
<button onclick="document.getElementById('cancelForm').style.display='block'" 
        style="background:red;color:white;padding:10px;border:none;border-radius:5px;">
    ❌ Cancel Booking
</button>

<div id="cancelForm" style="display:none; margin-top:15px;">
    <form action="cancel_booking.php" method="post">
        <input type="hidden" name="redirect_page" value="corporate_venue.php">

        <label><b>Enter Booking ID:</b></label><br><br>
        <input type="number" name="booking_id" required style="padding:8px;width:200px;"><br><br>

        <button type="submit" 
                style="background:#333;color:white;padding:8px 15px;border:none;border-radius:5px;">
            Cancel Booking
        </button>
    </form>
</div>
</center>

</body>
</html>
