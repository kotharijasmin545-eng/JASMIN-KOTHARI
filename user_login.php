<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users 
              WHERE username='$username' 
              AND password='$password'";

    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 1){

        $row = mysqli_fetch_assoc($result);

        // ✅ SESSION SET (MOST IMPORTANT)
        $_SESSION['user']     = $row['username'];
        $_SESSION['user_id']  = $row['id'];        // 👈 REQUIRED
        $_SESSION['name']     = $row['name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['city']     = $row['city'];
        $_SESSION['email']   = $row['email'];
        $_SESSION['mobile']  = $row['mobile'];

        header("Location: dashbord.php");
        exit();

    } else {
        $error = "Wrong Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Login</title>
    <link rel="stylesheet" href="user_login.css">
    <style>body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg, #667eea, #764ba2);
    font-family:Arial, sans-serif;

    body{
    margin:0;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:linear-gradient(135deg, #667eea, #764ba2);
    font-family:Arial, sans-serif;
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
    .error{
        margin-top:20px;
        font-size:16px;
        color:red;
        text-align:center;
    }
    .back-btn{
        display:block;
        text-align:center;
        margin-top:22px;
        font-size:16px;
        color:#667eea;
    }
}
</style>
</head>
<body>
<div class="login-box">
    <h2>User Login</h2>
    <form method="post" action="">
        <!-- Username : MAX 10 characters -->
        <input type="text"
               name="username"
               placeholder="Username"
               maxlength="10"
               required>

        <!-- Password : MAX 10 characters -->
        <input type="password"
               name="password"
               placeholder="Password"
               maxlength="10"
               required>

        <button type="submit" name="login">Login</button>
    </form>
    <?php
    if(isset($error)){
        echo "<p class='error'>$error</p>";
    }
    ?>
    <br>
    <a href="firstpage.php" class="back-btn">Back to Login</a>
    <br>
    <p>
        New User? <a href="user_register.php">Register Here</a>
    </p>
</div>
</body>
</html>
