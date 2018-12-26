<?php
$table = array(
    0 => "users",
    1 => "test"
);
$serveurName = "localhost";
$username = "root";
$userpass = "";
$conn = new mysqli($serveurName, $username, $userpass);
if ($conn->connect_error)
    die("Connection failed: " . $conn->connect_error);
else
    echo "Connected successfully";
$etat = tableExist($conn, $table[0]);
echo $etat;

function tableExist($database , $tableName)
{
    $b=false;
    $reponse = $database->query('show tables');
    while($data = $reponse->fetch())
        if($data == $tableName )
            $b = true;
    return $b;
}
?>