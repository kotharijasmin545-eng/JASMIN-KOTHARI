<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>

    <link rel="stylesheet" href="admin_login.css">

    <style>
        *{
            box-sizing:border-box;
        }
        body{
            margin:0;
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#667eea,#764ba2);
            font-family:Arial, sans-serif;
        }

       
        .login-box{
            width:460px;         
            background:#fff;
            padding:40px;       
            border-radius:14px;
            box-shadow:0 18px 40px rgba(0,0,0,0.35);
        }

        .login-box h2{
            text-align:center;
            margin-bottom:30px;
            color:#333;
            font-size:26px;
        }

        .login-box input{
            width:100%;
            padding:14px 48px 14px 14px;
            margin-bottom:22px;
            border:1px solid #ccc;
            border-radius:10px;
            font-size:15px;
            outline:none;
            transition:0.3s;
        }

        .login-box input:focus{
            border-color:#667eea;
            box-shadow:0 0 8px rgba(102,126,234,0.6);
        }

        .password-box{
            position:relative;
        }

        .password-box i{
            position:absolute;
            top:50%;
            right:16px;
            transform:translateY(-50%);
            color:#777;
            cursor:pointer;
            font-size:18px;
            transition:0.3s;
        }

        .password-box i:hover{
            color:#667eea;
        }

        button{
            width:100%;
            padding:14px;
            border:none;
            border-radius:10px;
            background:#667eea;
            color:#fff;
            font-size:18px;
            cursor:pointer;
            transition:0.3s;
        }

        button:hover{
            background:#5563d6;
        }

        .back-btn{
            display:block;
            text-align:center;
            margin-top:18px;
            text-decoration:none;
            color:#667eea;
            font-size:15px;
        }

        .error{
            margin-top:18px;
            color:red;
            text-align:center;
            font-size:15px;
        }
    </style>
</head>
<body>
<div class="login-box">
    <h2>Admin Login</h2>

    <form method="post">
        <input type="text"
               name="username"
               placeholder="Username"
               maxlength="10"
               required>

        <div class="password-box">
            <input type="password"
                   name="password"
                   id="password"
                   placeholder="Password"
                   maxlength="10"
                   required>
            <i class="fa-solid fa-eye" id="eye" onclick="togglePassword()"></i>
        </div>

        <button type="submit" name="login">Login</button>
    </form>

    <a href="firstpage.php" class="back-btn">← Back to Login</a>

    <?php
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if(strlen($username) > 10 || strlen($password) > 10){
            echo "<p class='error'>Username and Password must be max 10 characters</p>";
        }
        else if($username === "admin" && $password === "admin"){
            $_SESSION['admin'] = $username;
            header("Location: dashbord2.php");
            exit();
        }
        else{
            echo "<p class='error'>Invalid Admin Login</p>";
        }
    }
    ?>
</div>
<script>
function togglePassword(){
    const pass = document.getElementById("password");
    const eye = document.getElementById("eye");

    if(pass.type === "password"){
        pass.type = "text";
        eye.classList.replace("fa-eye","fa-eye-slash");
    }else{
        pass.type = "password";
        eye.classList.replace("fa-eye-slash","fa-eye");
    }
}
</script>
</body>
</html>
