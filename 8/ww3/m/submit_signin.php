<?php

if (isset($_POST['submit_in'])) {
    $inName = strip_tags($_POST['login_in']);
    $inPass = strip_tags($_POST['pass_in']);
    $inPassMd = md5($inPass);
    
    $signInObj = SQL::Instance()->Select("SELECT * FROM users_table WHERE user_email='$inName' AND user_password='$inPassMd'");
    
    if(isset($signInObj[0]['user_email'])){
        $_SESSION['login'] = $signInObj[0]['user_email'];
        $_SESSION['privelege'] = 3;
        $_SESSION['id'] = $signInObj[0]['id'];
        header("Location: /my_shop/user/room/"); 
    }else{
        echo 'Неправильно введен логин или пароль';
    }
    
}