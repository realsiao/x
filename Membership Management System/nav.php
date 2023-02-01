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
        <h1>会员管理系统</h1>
        <?php
        if(isset($_SESSION['loggedUsername']) && $_SESSION['loggedUsername'] <> ''){
         ?>
         <div class="logged">当前用户：<?php echo $_SESSION['loggedUsername'];?> <span class="logout"><a href="logout.php">注销登录</a></span></div> 
         <?
        }
        ?>
        
        <?php
        $id = isset($_GET['id']) ? $_GET['id'] : 1;
        ?>
        

        <h2>
            <a href="index.php?id=1" <?php if($id == 1 ){?>class="current"<?php }?>>首页</a>
            <a href="signup.php?id=2"<?php if($id == 2 ){?>class="current"<?php }?>>会员注册</a>
            <a href="login.php?id=3"<?php if($id == 3 ){?>class="current"<?php }?>>会员登录</a>
            <a href="modify.php?id=4"<?php if($id == 4 ){?>class="current"<?php }?>>个人资料修改</a>
            <a href="admin.php?id=5"<?php if($id == 5 ){?>class="current"<?php }?>>后台管理</a>
        </h2>
