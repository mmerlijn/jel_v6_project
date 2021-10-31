<?php
include "../src/start.php";
include "../src/auth.php";

// request json omzetten naar $_POST
$_POST = json_decode(file_get_contents('php://input'), true);

//valideren of er een geldige token is meegestuurd (tokens mogen niet worden gewist, daarom 'false')
if(validateToken(false)){
    //voor veiligheid
    $zoek = mysqli_real_escape_string($link, $_POST['zoek']);

    //query op database
    $result = mysqli_query($link, "SELECT * FROM users WHERE achternaam LIKE '%$zoek%' and deleted_at IS NULL LIMIT 10") or die (mysqli_error($link));

    //resultaat opbouwen
    $data=[];
    while ($row = mysqli_fetch_assoc($result)){
        unset($row['password']); //je wilt geen wachtwoorden tonen
        $data[] = $row;
    }
    echo json_encode($data);
}else{
    //bij ongeldige aanvraag
    echo "No valid TOKEN";
    http_response_code(401); //Unauthorized
}