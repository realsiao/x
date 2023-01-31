<doctype html>
<html>
<head>
<meta charset="utf-8">
<title>会员管理系统</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    .main{
        width:80%;
        margin:0 auto;
        text-align:center;
    }
    .main h2{
        font-size:20px;
        a{color: navy; text-decoration:underline; margin-right: 15px;};
    }

    .main h2:last-child{
        margin-right:0;
    }

    .main h2:hover{
        color:brown;
    }

    .current{
       color: brown; 
    }
</style>
</head>
<body>
    <div class="main">
        <h1>会员管理系统</h1>
        <h2>
            <a href="index.php" class="current">首页</a>
            <a href="signup.php">会员注册</a>
            <a href="login.php">会员登录</a>
            <a href="modify.php">个人资料修改</a>
            <a href="admin.php">后台管理</a>
        </h2>
    </div>
</body>
</html>