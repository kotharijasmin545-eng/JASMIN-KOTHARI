<?php
session_start();
if(!isset($_SESSION['admin']) && !isset($_SESSION['user'])){
    header("Location: user_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Select Birthday Venue</title>
    <link rel="stylesheet" href="venue.css">
</head>
<body>
<h2 class="title">🎂 Select Birthday Party Venue</h2>
<form action="book_event.php" method="get">
    <div class="venue-container">
        <label class="venue-card">
            <input type="radio" name="venue" value="Hotel" required>
            <img src="images/29.jpg">
            <p>Luxury Hotel</p>
        </label>
        <label class="venue-card">
            <input type="radio" name="venue" value="Cafe">
            <img src="images/30.jpg">
            <p>Party Cafe</p>
        </label>
        <label class="venue-card">
            <input type="radio" name="venue" value="Banquet Hall">
            <img src="images/banquet.jpg">
            <p>Banquet Hall</p>
        </label>
    </div>
<input type="hidden" name="event" value="Birthday">
<button class="next-btn">Next ➡</button>
</form>
</body>
</html>
