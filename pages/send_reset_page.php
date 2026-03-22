<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<?php
    include $phppath . 'website_specific_files/dbh_link.php';
    include $phppath . 'website_specific_files/mailer.php';
    include $phppath . 'logistic/login/token.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $token = generateToken();

        $stmt = $conn->prepare("UPDATE users SET token = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $email);

        if ($stmt->execute()) {
            sendResetEmail($email, $token);
            $message = $lang == 'de' ? 'Passwort Reset Link wurde gesendet!' : 'Password reset link sent!';
        } else {
            $message = "Error: " . $conn->error;
        }
    }
?>

<head>
    <title>Send Reset Link</title>
    <link rel="stylesheet" href="<?php echo"$htmlpath"?>styles/page_styling/register_page.css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
</head>
<body>
    <?php include_once $phppath . 'website_specific_files/ad-body.php'?>
    <?php include_once $phppath . 'logistic/structure/header.php'; ?>
    <div class="center">
        <div class="container">
            <form action="send_reset_page.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <button type="submit"><?php echo $lang == 'de' ? 'Sende Reset Link' : 'Send Reset Link'?></button>
            </form>
            <?php
                if (isset($message) && $message) {
                    echo "<p class='message'>$message</p>";
                }
            ?>
        </div>
    </div>
</body>