<?php
include "../../src/start.php";
include "../../src/auth.php";


//voor veiligheid
$zoek = mysqli_real_escape_string($link, $_POST['zoek']);

//query op database
$result = mysqli_query($link, "SELECT * FROM users WHERE achternaam LIKE '%$zoek%' and deleted_at IS NULL LIMIT 10") or die (mysqli_error($link));

//resultaat opbouwen
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    unset($row['password']); //je wilt geen wachtwoorden tonen
    $data[] = $row;
}

//geef het resultaat in json formaat terug
echo json_encode($data);
