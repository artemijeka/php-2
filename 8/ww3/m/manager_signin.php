<?php

if (isset($_POST['manager_in'])) {
    $inName = strip_tags($_POST['manager_name']);
    $inPass = strip_tags($_POST['manager_pass']);
    $inPassMd = md5($inPass);
    
    $signInObj = SQL::Instance()->Select("SELECT * FROM users_table WHERE user_email='$inName' AND user_password='$inPassMd'");
    
    if(isset($signInObj[0]['user_email'])){
        $_SESSION['login'] = $signInObj[0]['user_email'];
        $_SESSION['privelege'] = $signInObj[0]['privelege'];
        $_SESSION['id'] = $signInObj[0]['id'];
        header("Location: /my_shop/manager/"); 
    }else{
        echo 'Неправильно введен логин или пароль';
    }
    
}