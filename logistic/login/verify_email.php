<?php
    include_once '../../website_specific_files/web_config.php';
    include $phppath . 'website_specific_files/dbh_link.php';
    session_start();

    if (isset($_GET['token'])) {
        $token = $_GET['token'];
        $sql = "SELECT * FROM users WHERE token='$token' AND verified=0";
        $result = $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $name, $username, $country, $email, $password, $token);
        $stmt->execute();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            $update_sql = "UPDATE users SET verified=1, token=NULL WHERE id=" . $user['id'];
            if ($conn->query($update_sql) === TRUE) {
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];

                header("Location: " . $htmlpath . "index.php");
                exit();
            } else {
                echo "Fehler beim Aktualisieren der Daten. Bitte kontaktieren Sie den Support!| Error updating data. Please contact support!";
            }
        } else {
            echo "Ungültiger oder abgelaufener Token! Bitte kontaktieren Sie den Support! | Invalid or expired token! Please contact support!";
        }
    } else {
        echo "Kein Token gefunden. Bitte kontaktieren Sie den Support! | No token found. Please contact support!";
    }
?>
