<?php
require "database.php";

if (isset($_POST['user_id']) && $_POST['type']) {
    $user_id = $_POST['user_id'];
    $type = $_POST['type'];
    $sql ="UPDATE `users` SET `type`='$type' WHERE `id`=$user_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
} else echo "Error";
?>