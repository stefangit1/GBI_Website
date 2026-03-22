<?php
    if(isset($_GET['lang'])) {
            $lang = $_GET['lang'];
            setcookie("language", $lang, time() + (86400 * 30), "/");
            $_COOKIE['language'] = $lang;
            header("Location: " . $_SERVER['HTTP_REFERER']);
            exit();
    } else {
        header("Location: " . $_SERVER['HTTP_REFERER']);
    }
?>