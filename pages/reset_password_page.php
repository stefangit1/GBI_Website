<?php 
session_start(); 

include_once '../website_specific_files/web_config.php';
include_once $phppath . 'logistic/structure/groundstructure.php';
include $phppath . 'website_specific_files/dbh_link.php';

if (!isset($_GET['token'])) {
    header("Location: " . $htmlpath . "index.php");
    exit();
}

$token = $_GET['token'];

$stmt = $conn->prepare("SELECT * FROM users WHERE token = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: " . $htmlpath . "index.php");
    exit();
}

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $stmt = $conn->prepare("UPDATE users SET password = ?, token = NULL WHERE token = ?");
    $stmt->bind_param("ss", $hashed_password, $token);

    if ($stmt->execute()) {
        $message = $lang == 'de' ? 'Passwort wurde zurückgesetzt!' : 'Password reset!';
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<head>
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?php echo"$htmlpath"?>styles/page_styling/register_page.css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
</head>

<body>
    <?php include_once $phppath . 'website_specific_files/ad-body.php'?>
    <?php include_once $phppath . 'logistic/structure/header.php'; ?>
    <div class="center">
        <div class="container">
            <?php
            if ($message) {
                echo "<p class='message'>$message</p>";
            }
            ?>

            <form action="reset_password_page.php?token=<?php echo htmlspecialchars($token); ?>" method="POST">
                <label for="password"><?php echo $lang == 'de' ? 'Neues Passwort:' : 'New Password:'?></label>
                <input type="password" id="password" name="password" required>

                <button type="submit"><?php echo $lang == 'de' ? 'Passwort zurücksetzen' : 'Password Reset'?></button>
            </form>
        </div>
    </div>
</body>