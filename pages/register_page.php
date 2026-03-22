<?php session_start(); ?>

<?php include_once '../website_specific_files/web_config.php'?>
<?php include_once $phppath . 'logistic/structure/groundstructure.php'?>

<?php
    include $phppath . 'website_specific_files/dbh_link.php';
    include $phppath . 'website_specific_files/mailer.php';
    include $phppath . 'logistic/login/token.php';

    $message = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $country = $_POST['country'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

        $token = generateToken();

        $sql = "INSERT INTO users (name, username, country, email, password, verified, token) VALUES (?, ?, ?, ?, ?, 0, ?)";

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssssss", $name, $username, $country, $email, $password, $token);

            if ($stmt->execute()) {

                $sql_profile = "INSERT INTO profiles (email) VALUES (?)";
                $stmt2 = $conn->prepare($sql_profile);
                $stmt2->bind_param("s", $email);

                if (!$stmt2->execute()) {
                    $message = "Error: " . $conn->error;
                } else {
                    sendVerificationEmail($email, $token);
                    $message = $lang == 'de'
                        ? 'Registrierung erfolgreich! Bitte verifizieren Sie ihre email. Falls Sie keine Email erhalten haben kontaktieren Sie bitte unseren Support und Sie erhalten in wenigen Minuten ihren Zugang!'
                        : 'Registration successful! Please verify your email. If you have not received an email, please contact our support and you will receive your access in just a few minutes!';
                }
            }
        } catch (mysqli_sql_exception $e) {
            if ($conn->errno === 1062) {
                $message = $lang == 'de'
                    ? 'Diese Email wurde bereits registriert. Bitte benutzen Sie eine andere Email oder loggen Sie sich ein.'
                    : 'This email is already registered. Please use another email or log in.';
            } else {
                $message = "Error: " . $e->getMessage();
            }
        }
    }
?>

<head>
    <link rel="stylesheet" href="<?php echo $htmlpath ?>styles/page_styling/register_page.css">
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
</head>
<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>
<?php include_once $phppath . 'logistic/structure/header.php'?>

<div class="center">
    <div class="container">
        <form action="register_page.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="username"><?php echo $lang == 'de' ? 'Benutzername:' : 'Username:'?></label>
            <input type="text" id="username" name="username" required>

            <label for="country"><?php echo $lang == 'de' ? 'Land:' : 'Country:'?></label>
            <input type="text" id="country" name="country" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password"><?php echo $lang == 'de' ? 'Passwort:' : 'Password:'?></label>
            <input type="password" id="password" name="password" required>

            <button type="submit"><?php echo $lang == 'de' ? 'Registrieren' : 'Register'?></button>
        </form>

        <?php
        if ($message) {
            echo "<p class='message'>$message</p>";
        }
        ?>
    </div>
</div>
</body>
