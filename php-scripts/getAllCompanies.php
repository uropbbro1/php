<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require "database.php";

$check = "SELECT * FROM `company`";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
echo '[';
for ($i = 0; $i < count($result); $i++) {
    $user_id = $result[$i][0];
    $owner_id = $result[$i][1];
    $name = $result[$i][2];
    $address = $result[$i][3];
    $phone = $result[$i][4];
    $email = $result[$i][5];
    $site = $result[$i][6];
    $registration_number = $result[$i][7];
    $identification_number = $result[$i][8];
    $registration_reason_code = $result[$i][9];
    $OKPO = $result[$i][10];
    $OKVED = $result[$i][11];
    $BIC = $result[$i][12];
    $payment_account = $result[$i][13];
    $correspondent_account = $result[$i][14];
    $services_id = $result[$i][15];
    $info = $result[$i][16];


    echo '{';
    echo "\"id\"=\"$user_id\", ";
    echo "\"owner_id\"=\"$owner_id\", ";
    echo "\"name\"=\"$name\", ";
    echo "\"address\"=\"$address\", ";
    echo "\"phone\"=\"$phone\", ";
    echo "\"email\"=\"$email\", ";
    echo "\"site\"=\"$site\", ";
    echo "\"registration_number\"=\"$registration_number\", ";
    echo "\"identification_number\"=\"$identification_number\", ";
    echo "\"registration_reason_code\"\"$registration_reason_code\", ";
    echo "\"OKPO\"=\"$OKPO\", ";
    echo "\"OKVED\":=\"$OKVED\", ";
    echo "\"BIC\"=\"$BIC\", ";
    echo "\"payment_account\"=\"$payment_account\", ";
    echo "\"correspondent_account\"=\"$correspondent_account\", ";
    echo "\"services_id\"=\"$services_id\", ";
    echo "\"info\"=\"$info\"";
    echo '}';
    if (($i + 1) != count($result)) {
        echo ', ';
    }
}
echo ']';

?>