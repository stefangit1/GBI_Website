<?php $lang = isset($_COOKIE['language']) ? $_COOKIE['language'] : 'en'; ?>

<div class="navbar">
    <div class="nav_section_top">
        <div class="nav_socialMedia">
            <a href="https://www.youtube.com/channel/UCXsbazPEd7wM9v1MEPfxNXw" target="_blank"><img class="social_icon" src="<?php echo $htmlpath ?>styles/images/youtube.png" alt="YouTube"></a>
            <a href="https://at.pinterest.com/greenbumbleautomatic/" target="_blank"><img class="social_icon" src="<?php echo $htmlpath ?>styles/images/pinterest.png" alt="Pinterest"></a>
            <a href="https://www.tiktok.com/@greenbumbleinvest_com" target="_blank"><img class="social_icon" src="<?php echo $htmlpath ?>styles/images/tiktok.png" alt="TikTok"></a>
            <a href="https://www.instagram.com/greenbumbleinvest/" target="_blank"><img class="social_icon" src="<?php echo $htmlpath ?>styles/images/instagram.png" alt="Instagram"></a>
        </div>
        <div class="nav_logo">
            <a href="<?php echo $htmlpath ?>index.php"><img class="logo" src="<?php echo $htmlpath ?>styles/images/GBI_Logo_1_transparent.png" alt="GBI Logo"></a>
        </div>
        <div class="nav_utilities">
            <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
                <div class="profile_nav_section">
                    <button type="button" class="userprofilenav_button" id="userprofilenav_button"><?php echo $_SESSION['username']?> &#1639;</button>
                    <div id="dropdownMenu_userProfile" class="dropdown-content">
                        <a href="<?php echo $htmlpath ?>pages/user_profile_page.php">Profil</a>
                    </div>
                </div>
            <?php else: ?>

                <div class="log_in_nav_section">
                    <a href="#" class="nav_link">
                        <button type="button" class="log_button" id="log_button"><?php echo $lang == 'de' ? 'Anmelden' : 'Log In'; ?> </button>
                    </a>
                    <div class="data_log_in_dropdown" id="data_log_in_dropdown">
                        <form action="<?php echo "$htmlpath" ?>logistic/login/login.php" method="POST">
                            <div class="form-group">
                                <label for="email"><?php echo $lang == 'de' ? 'Email' : 'Email'; ?></label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password"><?php echo $lang == 'de' ? 'Passwort' : 'Password'; ?></label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <?php
                            if (isset($_SESSION['login_error'])) {
                                echo "<p style='color: red;'>" . $_SESSION['login_error'] . "</p>";
                                unset($_SESSION['login_error']);
                            }
                            ?>
                            <div class="form-group">
                                <a href="<?php echo "$htmlpath" ?>pages/send_reset_page.php">
                                    <?php echo $lang == 'de' ? 'Passwort vergessen?' : 'Forgot password?'; ?>
                                </a>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="<?php echo $lang == 'de' ? 'Anmelden' : 'Log In'; ?>">
                            </div>
                        </form>
                    </div>
                </div>

                <div class="register_nav_section">
                    <a href="<?php echo"$htmlpath"?>pages/register_page.php" class="nav_link">
                        <button type="button" class="reg_button"><?php if($lang == 'de'){echo 'Registrieren';}else {echo 'Register';}?></button>
                    </a>
                </div>
            <?php endif; ?>

            <script>
                const dropdownButton = document.getElementById('userprofilenav_button');
                const dropdownMenu = document.getElementById('dropdownMenu_userProfile');

                dropdownButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
                });

                window.addEventListener('click', function() {
                    dropdownMenu.style.display = 'none';
                });
                dropdownMenu.addEventListener('click', function(event) {
                    event.stopPropagation();
                });
            </script>
            <script>
                document.getElementById('log_button').addEventListener('click', function () {
                    const dropdown = document.getElementById('data_log_in_dropdown');
                    dropdown.classList.toggle('show');
                });
            </script>

        </div>

    </div>

    <div class="nav_section_bottom">
        <a href="<?php echo $htmlpath ?>pages/product_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Apps';}else {echo 'Apps';}?></a>
        <a href="<?php echo $htmlpath ?>pages/information_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Kurse';}else {echo 'Courses';}?></a>
        <div class="dropdown_tools">
            <a href="<?php echo $htmlpath ?>pages/tools_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Werkzeug';}else {echo 'Tools';}?></a>
            <div class="tools_in_dropdown">
                <a href="<?php echo $htmlpath ?>pages/position_calc_page.php"><?php if($lang == 'de'){echo 'Positionsrechner';}else {echo 'Position Calculator';}?></a>
                <a href="<?php echo $htmlpath ?>pages/interest_calc_page.php"><?php if($lang == 'de'){echo 'Zinsrechner';}else {echo 'Interest Calculator';}?></a>
                <a href="<?php echo $htmlpath ?>pages/worldclock_page.php"><?php if($lang == 'de'){echo 'Börsenuhr';}else {echo 'Stock Exchange Clock';}?></a>
            </div>
        </div>
        <a href="<?php echo $htmlpath ?>pages/about_us_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Über uns';}else {echo 'About us';}?></a>
        <a href="<?php echo $htmlpath ?>pages/contact_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Kontakt';}else {echo 'Contact';}?></a>
        <a href="<?php echo $htmlpath ?>pages/help_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Hilfe';}else {echo 'Help';}?></a>
        <div class="dropdown_languages">
            <a href="#" class="nav_link"><?php if($lang == 'de'){echo 'Sprache';}else {echo 'Language';}?></a>
            <div class="languages_in_dropdown">
                <a href="<?php echo $htmlpath ?>logistic/functions/language_link.php?lang=de"><?php if($lang == 'de'){echo '<span style="text-decoration: underline">Deutsch</span>';}else {echo 'German';}?></a>
                <a href="<?php echo $htmlpath ?>logistic/functions/language_link.php?lang=en"><?php if($lang == 'de'){echo 'Englisch';}else {echo '<span style="text-decoration: underline">English</span>';}?></a>
            </div>
        </div>
    </div>

    <div class="nav_section_bottom_mobile">
        <div class="nav_utilities_mobile">
        </div>
        <button class="nav_menu_button"><?php if($lang == 'de'){echo 'Menü';}else {echo 'Menu';}?> &#9660;</button>
        <div class="nav_dropdown">
            <a href="<?php echo $htmlpath ?>pages/product_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Apps';}else {echo 'Apps';}?></a>
            <a href="<?php echo $htmlpath ?>pages/information_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Kurse';}else {echo 'Courses';}?></a>
            <div class="dropdown_tools">
                <a href="#" class="nav_link"><?php if($lang == 'de'){echo 'Werkzeug';}else {echo 'Tools';}?></a>
                <div class="tools_in_dropdown">
                    <a href="<?php echo $htmlpath ?>pages/position_calc_page.php"><?php if($lang == 'de'){echo 'Positions-rechner';}else {echo 'position calculator';}?></a>
                    <a href="<?php echo $htmlpath ?>pages/interest_calc_page.php"><?php if($lang == 'de'){echo 'Zinsrechner';}else {echo 'interest calculator';}?></a>
                    <a href="<?php echo $htmlpath ?>pages/worldclock_page.php"><?php if($lang == 'de'){echo 'Börsenuhr';}else {echo 'stock exchange clock';}?></a>
                </div>
            </div>
            <a href="<?php echo $htmlpath ?>pages/about_us_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Über uns';}else {echo 'About us';}?></a>
            <a href="<?php echo $htmlpath ?>pages/contact_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Kontakt';}else {echo 'Contact';}?></a>
            <a href="<?php echo $htmlpath ?>pages/help_page.php" class="nav_link"><?php if($lang == 'de'){echo 'Hilfe';}else {echo 'Help';}?></a>
            <div class="dropdown_languages">
                <a href="#" class="nav_link"><?php if($lang == 'de'){echo 'Sprache';}else {echo 'Language';}?></a>
                <div class="languages_in_dropdown">
                    <a href="<?php echo $htmlpath ?>logistic/functions/language_link.php?lang=de"><?php if($lang == 'de'){echo '<span style="text-decoration: underline">Deutsch</span>';}else {echo 'German';}?></a>
                    <a href="<?php echo $htmlpath ?>logistic/functions/language_link.php?lang=en"><?php if($lang == 'de'){echo 'Englisch';}else {echo '<span style="text-decoration: underline">English</span>';}?></a>
                </div>
            </div>
        </div>
    </div>

</div>