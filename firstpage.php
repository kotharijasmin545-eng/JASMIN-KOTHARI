<!DOCTYPE html>
<html>
<head>
    <title>Event Management System</title>

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
            font-family:Arial, sans-serif;

            /* 🌈 Premium Gradient */
            background:linear-gradient(135deg, #667eea, #764ba2);
        }

        .box{
            width:500px;
            background:#fff;
            padding:45px;
            text-align:center;
            border-radius:18px;
            box-shadow:0 22px 50px rgba(0,0,0,0.35);
            animation:fadeIn 0.8s ease;
        }
        @keyframes fadeIn{
            from{
                opacity:0;
                transform:translateY(30px);
            }
            to{
                opacity:1;
                transform:translateY(0);
            }
        }

        .box h2{
            margin-bottom:35px;
            font-size:28px;
            color:#333;
        }
        .box a{
            display:block;
            margin:18px 0;
            padding:16px;
            background:#667eea;
            color:white;
            text-decoration:none;
            font-size:18px;
            border-radius:12px;
            transition:0.3s;
        }

        .box a:hover{
            background:#5563d6;
            box-shadow:0 8px 18px rgba(0,0,0,0.25);
            transform:translateY(-2px);
        }

        .box a:first-of-type{
            background:#343aeb;
        }

        .box a:first-of-type:hover{
            background:#2c32c9;
        }
    </style>
</head>
<body>
<div class="box">
    <h2>Select Login Type</h2>
    <a href="admin_login.php">Admin Login</a>
    <a href="user_login.php">User Login</a>
</div>
</body>
</html>
