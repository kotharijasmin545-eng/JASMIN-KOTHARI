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
    <title>Party / Event Management System</title>
    <link rel="stylesheet" href="dashbord.css">
</head>
<body>
<div class="header">
    <h1>🎉 Party / Event Management</h1>
    <p>Book Your Events Easily</p>
</div>
<h2 class="section-title">Our Event Packages</h2>
<div class="card-container">
    <div class="card">
        <h3>🎂 Birthday Party</h3>
        <p>Decoration + Music + Cake Setup</p>
        <h4>₹5,000</h4>
        <a href="birthday_venue.php?event=Birthday">
            <button>Book Now</button>
        </a>
    </div>
    <div class="card">
        <h3>💍 Wedding Event</h3>
        <p>Stage + Decoration + Catering</p>
        <h4>₹25,000</h4>
        <a href="wedding_venue.php?event=Wedding">
            <button>Book Now</button>
        </a>
    </div>
    <div class="card">
        <h3>🏢 Corporate Event</h3>
        <p>Stage + Lighting + Food</p>
        <h4>₹15,000</h4>
        <a href="corporate_venue.php?event=Corporate">
            <button>Book Now</button>
        </a>
    </div>
</div>
<center>
<a href="firstpage.php" class="back-btn">⬅ Back to Home Page</a>
</center>
<br>    
<div class="footer">
    © 2026 Event Management System | Demo Project
</div>
</body>
</html>
