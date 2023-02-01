<?php session_start(); ?>
<!doctype html>
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
    .logged{
        font-size: 16px;
        color: blue;
    }
    .logout{
        margin-left: 20px;
        
    }
</style>
</head>
<body>
 <div class="main">
     <?php
     include_once 'nav.php';
     ?>
 </div>
</body>
</html>