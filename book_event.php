<?php
session_start();
include "db.php";

/* LOGIN CHECK */
if(!isset($_SESSION['user'])){
    header("Location: user_login.php");
    exit();
}

/* EVENT CHECK */
if(!isset($_GET['event'])){
    header("Location: dashbord2.php");
    exit();
}

$event_type = $_GET['event'];

/* FORM SUBMIT */
if(isset($_POST['submit'])){

    $surname    = $_POST['surname'];
    $name       = $_POST['name'];
    $city       = $_POST['city'];
    $event_date = $_POST['event_date'];
    $email      = $_POST['email'];
    $mobile     = $_POST['mobile'];

    $user_id = $_SESSION['user_id'];

    $query = "INSERT INTO bookings 
        (surname, name, city, event_type, event_date, email, mobile, user_id)
        VALUES
        ('$surname', '$name', '$city', '$event_type', '$event_date', '$email', '$mobile', '$user_id')";

    if(mysqli_query($conn, $query)){
        echo "<script>
                alert('Booking Successful');
                window.location.href='birthday_venue.php';
              </script>";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Event</title>
    <link rel="stylesheet" href="book_event.css">
</head>
<body>
<div class="form-container">
    <h2>Book Event</h2>

    <form action="book_event.php?event=<?php echo $event_type; ?>" method="post">

        <input type="hidden" name="event_type" value="<?php echo $event_type; ?>">

        <input type="text" name="surname" placeholder="Surname" required>
        <input type="text" name="name" placeholder="Name" required>
        <input type="text" name="city" placeholder="City" required>

       
        <input type="date" name="event_date" min="<?php echo date('Y-m-d'); ?>" required>

        <input type="email" name="email" placeholder="Email">
        <input type="text" name="mobile" placeholder="Mobile Number">

        <button type="submit" name="submit">Submit</button>
    </form>

    <a href="dashbord.php" class="back-btn">⬅ Back to Dashboard</a>


</div>
</body>
</html>
