<?php
session_start();
include "db.php";

// LOGIN CHECK
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
    header("Location: user_login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Corporate Venue</title>
    <link rel="stylesheet" href="venue.css">
</head>
<body>

<h2 class="title">🏢 Select Corporate Event Venue</h2>

<div class="venue-container">

    <label class="venue-card">
        <input type="radio" name="venue">
        <img src="images/55.jpg">
        <p>Corporate Hotel</p>
    </label>

    <label class="venue-card">
        <input type="radio" name="venue">
        <img src="images/corporation2.jpg">
        <p>Conference Hall</p>
    </label>

    <label class="venue-card">
        <input type="radio" name="venue">
        <img src="images/56.jpg">
        <p>Business Center</p>
    </label>

    <label class="venue-card">
        <input type="radio" name="venue">
        <img src="images/4.jpg">
        <p>Premium Hall</p>
    </label>

</div>

<div class="action-buttons">
    <a href="dashbord.php"><button class="back-btn">Back</button></a>
    <a href="book_event.php?event=Corporate" class="next-btn">Booking</a>
</div>

<hr>

<h2 class="title">🏢 Corporate Event Bookings</h2>

<table border="1" width="90%" align="center" cellpadding="10">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>City</th>
    <th>Event Date</th>
    <th>Email</th>
    <th>Mobile</th>
    <th>Action</th>
</tr>

<?php
// QUERY LOGIC
$query = "SELECT * FROM bookings WHERE user_id='$user_id' AND event_type='Corporate' ORDER BY id DESC";

$result = mysqli_query($conn, $query);

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
    echo "<tr><td colspan='7' align='center'>No Corporate Bookings Found</td></tr>";
}
?>
</table>

<br>

<!-- CANCEL BOOKING -->
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
