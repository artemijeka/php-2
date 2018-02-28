<?php

if (isset($_POST['submit_up'])) {
    $regName = strip_tags($_POST['login_up']);
    $regPass = strip_tags($_POST['pass_up']);
    $regPassMd = md5($regPass);
    
    $searchUser = SQL::Instance()->Select("SELECT user_email FROM users_table WHERE user_email='$regName'");
    
    if(isset($searchUser[0]['user_email'])){
        $z = $searchUser[0]['user_email'];
        echo "Пользователь с именем $z уже существует";
    }else{
        $regUserObj = SQL::Instance()->Insert('users_table', ['id'=>null, 'user_email'=>$regName, 'user_password'=>$regPassMd, 'privelege'=>'3']);
        
        if($regUserObj){
            $_SESSION['login'] = $regName;
            $_SESSION['privelege'] = 3;
            $_SESSION['id'] = $regUserObj;
            header("Location: /my_shop/user/room/"); 
        }
    }
}

