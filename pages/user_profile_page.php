<?php
    session_start(); 
    include_once '../website_specific_files/web_config.php';

    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: " . $htmlpath . "index.php");
        exit();
    }

    $description = isset($_SESSION['description']) ? $_SESSION['description'] : '';
    $tags = isset($_SESSION['tags']) ? $_SESSION['tags'] : '';
    $profile_picture = isset($_SESSION['profile_picture']) ? $_SESSION['profile_picture'] : '';
?>

<head>
    <link rel="stylesheet" href="<?php echo"$htmlpath"?>styles/page_styling/user_profile_page.css">
    <?php $lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en'; ?>
    <?php include_once $phppath . 'website_specific_files/ad-head.php'?>
</head>
<body>
<?php include_once $phppath . 'website_specific_files/ad-body.php'?>

<nav class="navbar">
    <a href="<?php echo $htmlpath ?>index.php"><?php echo $lang == 'de' ? 'Startseite' : 'Homepage' ?></a>
    <a href="<?php echo $htmlpath ?>logistic/login/logout.php"><?php echo $lang == 'de' ? 'Abmelden' : 'Log out' ?></a>
</nav>

<div class="profile-page">
    <header class="header">
        <h1><?php echo $lang == 'de' ? 'Willkommen, ' . $_SESSION['username'] : 'Welcome, ' . $_SESSION['username'] ?></h1>
    </header>

    <div class="profile-info">
        <img src="<?php echo file_exists($_SESSION['profile_picture']) ? htmlspecialchars($_SESSION['profile_picture']) : $phppath . 'profiles/pictures/'; ?>" alt="Profilbild" class="profile-picture">
        <h2 id="display-username"><?php echo $_SESSION['username'] ?></h2>
        <p>Email: <?php echo $_SESSION['email'] ?></p>
        <p><?php echo $lang == 'de' ? 'Beschreibung:' : 'Description:' ?> <?php echo $description ?></p>
        <p><?php echo $lang == 'de' ? 'Tags:' : 'Tags:' ?> <?php echo $tags ?></p>
        <button class="edit-profile-btn" id="edit-profile-btn"><?php echo $lang == 'de' ? 'Profil bearbeiten' : 'Edit Profile' ?></button>
        <button class="edit-review-btn" id="edit-review-btn"><?php echo $lang == 'de' ? 'Rezension bearbeiten' : 'Edit Review' ?></button>
    </div>

    <div class="profile-details" id="edit-profile-form" style="display: none;">
        <h3><?php echo $lang == 'de' ? 'Profil bearbeiten' : 'Edit Profile' ?></h3>
        <form action="user_profile_page.php" method="POST" enctype="multipart/form-data">
            <label for="profile_picture"><?php echo $lang == 'de' ? 'Profilbild ändern:' : 'Change Profile Picture:' ?></label>
            <input type="file" id="profile_picture" name="profile_picture" accept="image/*">
            
            <label for="username"><?php echo $lang == 'de' ? 'Neuer Benutzername:' : 'New Username:' ?></label>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION['username'] ?>">

            <label for="description"><?php echo $lang == 'de' ? 'Beschreibung:' : 'Description:' ?></label>
            <textarea id="description" name="description" rows="4"><?php echo $description ?></textarea>
            
            <label for="tags"><?php echo $lang == 'de' ? 'Tags:' : 'Tags:' ?></label>
            <input type="text" id="tags" name="tags" value="<?php echo $tags ?>">

            <button type="submit" name="update_profile" class="save-profile-btn"><?php echo $lang == 'de' ? 'Speichern' : 'Save' ?></button>
        </form>
    </div>

</div>


    <?php
        include_once $phppath . 'website_specific_files/dbh_link.php';

        $has_reviewed = false;
        $review_data = null;
        
        $user_email = $_SESSION['email'];
        $sql_check = "SELECT * FROM reviews WHERE email = '$user_email'";
        $result = $conn->query($sql_check);

        if ($result->num_rows > 0) {
            $has_reviewed = true;
            $review_data = $result->fetch_assoc();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_profile'])) {
            $new_username = $conn->real_escape_string($_POST['username']);
            $description = $conn->real_escape_string($_POST['description']);
            $tags = $conn->real_escape_string($_POST['tags']);
            $email = $_SESSION['email'];
            
            if (!empty($_FILES['profile_picture']['name'])) {
                $profile_picture = $_FILES['profile_picture']['name'];
                $target_dir = $phppath . "profiles/pictures/";
                $target_file = $target_dir . basename($profile_picture);
                
                if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
                    $_SESSION['profile_picture'] = $target_file;
                } else {
                    echo "<p class='message'>Error uploading file.</p>";
                }
            }

            $sql_update_profile = "UPDATE users SET username='$new_username', description='$description', tags='$tags' WHERE email='$email'";
            if ($conn->query($sql_update_profile) === TRUE) {
                $_SESSION['username'] = $new_username;
                $_SESSION['description'] = $description;
                $_SESSION['tags'] = $tags;
                echo "<p class='message'>" . ($lang == 'de' ? 'Profil erfolgreich aktualisiert!' : 'Profile updated successfully!') . "</p>";
            } else {
                echo "<p class='message'>Error: " . $sql_update_profile . "<br>" . $conn->error . "</p>";
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['submit_review']) || isset($_POST['update_review']))) {
            $review = $conn->real_escape_string($_POST['review']);
            $rating = (int)$_POST['rating'];
            $username = $_SESSION['username'];
            $email = $_SESSION['email'];

            if ($has_reviewed) {
                $sql_update_review = "UPDATE reviews SET review='$review', rating=$rating WHERE email='$email'";
                if ($conn->query($sql_update_review) === TRUE) {
                    echo "<p class='message'>" . ($lang == 'de' ? 'Rezension erfolgreich aktualisiert!' : 'Review updated successfully!') . "</p>";
                } else {
                    echo "<p class='message'>Error: " . $sql_update_review . "<br>" . $conn->error . "</p>";
                }
            } else {
                $sql_insert_review = "INSERT INTO reviews (username, email, review, rating) VALUES ('$username', '$email', '$review', $rating)";
                if ($conn->query($sql_insert_review) === TRUE) {
                    echo "<p class='message'>" . ($lang == 'de' ? 'Rezension erfolgreich gespeichert!' : 'Review saved successfully!') . "</p>";
                } else {
                    echo "<p class='message'>Error: " . $sql_insert_review . "<br>" . $conn->error . "</p>";
                }
            }
        }
    ?>
</div>

<script>
    document.getElementById('edit-profile-btn').addEventListener('click', function() {
        const editProfileForm = document.getElementById('edit-profile-form');
        editProfileForm.style.display = editProfileForm.style.display === 'block' ? 'none' : 'block';
    });

    document.getElementById('edit-review-btn').addEventListener('click', function() {
        const editReviewForm = document.getElementById('edit-review-form');
        editReviewForm.style.display = editReviewForm.style.display === 'block' ? 'none' : 'block';
    });

    <?php if ($has_reviewed): ?>
        document.getElementById('edit-review-btn').style.display = 'block';
    <?php endif; ?>
</script>
</body>