<?php session_start(); ?>
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
     <?php
     include_once 'nav.php';
     ?>

        <form action="postReg.php" method="post">
            <table align="center" border="1" style="border-collapse: collapse" cellpadding="10" cellspacing="0">
            <tr>
                <td>用户名</td>
                <td><input name="username"></td>
            </tr>
        
            <tr>
                <td>密码</td>
                <td><input type="password" name="pw"></td>
            </tr>
     
            <tr>
                <td>确认密码</td>
                <td><input type="password" name="pw2"></td>
            </tr>
            <tr>
                <td>性别</td>
                <td>
                    <input name="sex" type="radio" checked value="男">男
                    <input name="sex" type="radio" value="女">女
                </td>
            </tr>

            <tr>
                <td>爱好</td>
                <td>
                    <input name="fav[]" type="checkbox" checked value="music">听音乐
                    <input name="fav[]" type="checkbox" value="game">玩游戏
                    <input name="fav[]" type="checkbox" value="football">踢足球
                </td>
            </tr>

            <tr>
                <td><input type="submit" value="提交"></td>
                <td><input type="reset" value="重置"></td>
            </tr>



            </table>
        </form>
    </div>
</body>
</html>