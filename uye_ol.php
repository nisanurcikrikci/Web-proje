<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanıcıadı = $_POST['kullanıcıadı'];
    $şifre1 = $_POST['şifre1'];
    
    if (!empty($kullanıcıadı) && !empty($şifre1)) {
        // E-posta formatını kontrol et
        if (filter_var($kullanıcıadı, FILTER_VALIDATE_EMAIL)) {
            // E-posta formatının b231210044@sakarya.edu.tr olup olmadığını kontrol et
            if (preg_match('/^b\d{9}@sakarya\.edu\.tr$/', $kullanıcıadı)) {
                $kullanıcısayıları = explode('@', $kullanıcıadı)[0];
                
                if ($kullanıcısayıları === $şifre1) {
                    $message = "Hoşgeldiniz \"$kullanıcısayıları\"";
                    header("Location: üye_ol.html?message=" . urlencode($message));
                    exit;
                } else {
                    $message = "Şifre yanlış. Lütfen şifreyi uyarıda gösterilen formatta giriniz. Örnek: B231210044";
                    header("Location: üye_ol.html?message=" . urlencode($message));
                    exit;
                }
            } else {
                $message = "Kullanıcı adı b231210044@sakarya.edu.tr formatında olmalı.";
                header("Location: üye_ol.html?message=" . urlencode($message));
                exit;
            }
        } else {
            $message = "Kullanıcı adı geçerli bir email formatında olmalı.";
            header("Location: üye_ol.html?message=" . urlencode($message));
            exit;
        }
    } else {
        $message = "Kullanıcı adı ve şifre boş olamaz.";
        header("Location: üye_ol.html?message=" . urlencode($message));
        exit;
    }
}
?>
