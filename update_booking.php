<?php
include "db.php";

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM bookings WHERE id=$id");
$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){
    $surname = $_POST['surname'];
    $name = $_POST['name'];
    $city = $_POST['city'];
    $date = $_POST['event_date'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];

    mysqli_query($conn, "UPDATE bookings SET 
        surname='$surname',
        name='$name',
        city='$city',
        event_date='$date',
        email='$email',
        mobile='$mobile'
        WHERE id=$id
    ");

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Booking</title>
    <link rel="stylesheet" href="update_booking.css">
</head>
<body>

<div class="form-box">
    <h2>✏ Update Birthday Booking</h2>
    <form method="post">
        <label>Surname</label>
        <input type="text" name="surname" value="<?php echo $row['surname']; ?>" required>

        <label>Name</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>

        <label>City</label>
        <input type="text" name="city" value="<?php echo $row['city']; ?>" required>

        <label>Event Date</label>
        <input type="date" name="event_date" value="<?php echo $row['event_date']; ?>" required>

        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>

        <label>Mobile</label>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>" required>

        <button type="submit" name="update" class="update-btn">
            ✅ Update Booking
        </button>
        <a href="birthday_venue.php" class="back-btn">← Back</a>
    </form>
</div>
</body>
</html>
