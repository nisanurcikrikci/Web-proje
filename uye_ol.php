<?php

echo "giriş";

if(isset($_POST['kullanıcıadı']) && isset($_POST['şifre1'])) {
    $kullanıcıadı = $_POST['kullanıcıadı'];
    $şifre1 = $_POST['şifre1'];
    
    if(!empty($kullanıcıadı) && !empty($şifre1)) {
       
        if(filter_var($kullanıcıadı, FILTER_VALIDATE_EMAIL)) {
           
            $kullanıcısayıları = explode('@', $kullanıcıadı)[0];
            
           
            if($kullanıcısayıları === $şifre1) {
                
                echo "Hoşgeldiniz \"$kullanıcısayıları\"";
               
                // header("Location: welcome.php");
                
            } else {
                echo "Şifre yanlış";
                //header("Location: üye_ol.html");
               
            }
        } else {
            echo "Kullanıcı adı email formatında olmalı";
           // header("Location: üye_ol.html");
            
        }
    } else {
        echo "Kullanıcı adı ve şifre boş olamaz";
        //header("Location: üye_ol.html");
        
        
    }
} else {
    echo "Kullanıcı adı ve şifre boş olamaz";
    //header("Location: üye_ol.html");
    
   
}

?>
