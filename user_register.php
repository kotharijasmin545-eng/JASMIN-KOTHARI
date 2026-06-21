
<?php
include "db.php";

if(isset($_POST['register'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    // NO PASSWORD HASH
    $query = "INSERT INTO users (username, password)
              VALUES ('$username', '$password')";

    if(mysqli_query($conn, $query)){
        header("Location: user_login.php");
        exit();
    } else {
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Register</title>
    <link rel="stylesheet" href="user_register.css">
    <style>
    body{
    margin:0;
    min-height:100vh;
    display:flex;
    justify-content:center;   
    align-items:center;      
    background:linear-gradient(to right, #667eea, #764ba2);
    font-family:Arial;
}
.login-box{
    width:500px;        
    padding:55px;       
    background:#fff;
    border-radius:18px;
    box-shadow:0 22px 50px rgba(0,0,0,0.4);
}
.login-box h2{
    text-align:center;
    margin-bottom:20px;
    font-size:30px;
}
.login-box input{
    width:100%;
    padding:18px;
    margin-bottom:28px;
    font-size:16px;
    border-radius:12px;
    border:1px solid #ccc;
}
button{
    width:100%;
    padding:18px;
    font-size:20px;
    border-radius:12px;
    background:#667eea;
    color:white;
    border:none;
}

</style>
</head>
<body>
<div class="login-box">
    <h2>User Registration</h2>

    <form method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button name="register">Register</button>
    </form>
    <br>
    <a href="user_login.php" class="back-btn">Back to User Login</a>
    <br>

    <?php
    if(isset($_POST['register'])){
        header("refresh:1;url=user_login.php");
    }
    ?>
</div>
</body>
</html>
