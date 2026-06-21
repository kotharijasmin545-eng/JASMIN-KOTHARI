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
    <style>/* Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* Background */
body {
    min-height: 100vh;
    background: linear-gradient(135deg, #667eea, #764ba2);
    color: #333;
}

/* Header */
.header {
    text-align: center;
    padding: 40px 20px;
    color: #fff;
}

.header h1 {
    font-size: 2.5rem;
    font-weight: 700;
}

.header p {
    font-size: 1.1rem;
    opacity: 0.9;
    margin-top: 8px;
}

/* Section title */
.section-title {
    text-align: center;
    color: #fff;
    font-size: 1.8rem;
    margin: 30px 0;
}

/* Card layout */
.card-container {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
    padding: 0 40px 40px;
}

/* Cards */
.card {
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(12px);
    border-radius: 18px;
    padding: 25px;
    text-align: center;
    color: #fff;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card:hover {
    transform: translateY(-12px) scale(1.03);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.35);
}

.card h3 {
    font-size: 1.5rem;
    margin-bottom: 10px;
}

.card p {
    font-size: 0.95rem;
    opacity: 0.9;
    margin-bottom: 15px;
}

.card h4 {
    font-size: 1.4rem;
    margin-bottom: 20px;
    color: #ffeb3b;
}

/* Buttons */
.card button {
    background: linear-gradient(135deg, #ff512f, #f09819);
    border: none;
    padding: 12px 28px;
    border-radius: 30px;
    font-size: 1rem;
    color: #fff;
    cursor: pointer;
    transition: all 0.3s ease;
}

.card button:hover {
    background: linear-gradient(135deg, #f09819, #ff512f);
    transform: scale(1.05);
}

/* Back button */
.back-btn {
    display: inline-block;
    margin: 20px auto;
    padding: 12px 25px;
    background: #fff;
    color: #764ba2;
    text-decoration: none;
    font-weight: 600;
    border-radius: 30px;
    transition: 0.3s ease;
}

.back-btn:hover {
    background: #ffeb3b;
    color: #333;
}

/* Footer */
.footer {
    text-align: center;
    padding: 15px;
    background: rgba(0, 0, 0, 0.25);
    color: #fff;
    font-size: 0.9rem;
}

/* Responsive tweaks */
@media (max-width: 600px) {
    .header h1 {
        font-size: 2rem;
    }

    .section-title {
        font-size: 1.5rem;
    }
}
</style>
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
            <button>View</button>
        </a>
    </div>
    <div class="card">
        <h3>💍 Wedding Event</h3>
        <p>Stage + Decoration + Catering</p>
        <h4>₹25,000</h4>
        <a href="wedding_venue.php?event=Wedding">
            <button>View</button>
        </a>
    </div>
    <div class="card">
        <h3>🏢 Corporate Event</h3>
        <p>Stage + Lighting + Food</p>
        <h4>₹15,000</h4>
        <a href="corporate_venue.php?event=Corporate">
            <button>View</button>
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
