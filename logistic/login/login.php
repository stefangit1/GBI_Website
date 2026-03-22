<?php include_once '../../website_specific_files/web_config.php' ?>

<?php
    include $phppath . 'website_specific_files/dbh_link.php';

    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email = ? AND verified = 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];

            header("Location: " . $htmlpath . "index.php");
            exit();
        } else {
            $_SESSION['login_error'] = $lang == 'de' ? 'Ungültige Anmeldedaten oder Email nicht verifiziert!' : 'Invalid credentials or email not verified!';
            header("Location: " . $htmlpath . "index.php");
            exit();
        }
    } else {
        header("Location: " . $htmlpath . "index.php");
    }
?>
