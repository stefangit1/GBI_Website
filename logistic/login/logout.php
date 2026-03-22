<?php include_once '../../website_specific_files/web_config.php'?>

<?php
    session_start();
    session_unset();
    session_destroy();

    header("Location: " . $htmlpath . "index.php");
    exit();
?>