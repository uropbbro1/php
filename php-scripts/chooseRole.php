<?php
require "database.php";

if (isset($_POST['id']) && isset($_POST['type'])) {
    $id = $_POST['id'];
    $type = $_POST['type'];
    $sql = "UPDATE `users` SET `type`='$type' WHERE `id`=$id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
} else echo "Error";
