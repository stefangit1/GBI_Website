<?php

$sql = "SELECT COUNT(*) AS user_count FROM users";
$result = $stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $name, $username, $country, $email, $password, $token);
$stmt->execute();
$row = $result->fetch_assoc();
$user_count = $row['user_count'];

?>