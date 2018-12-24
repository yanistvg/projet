<?php
$table = array(
    0 => "users",
    1 => "test"
);
$serveurName = "localhost";
$username = "root";
$userpass = "";
$conn = new mysqli($serveurName, $username, $userpass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";
$etat = tableExist($conn, "users");
echo $etat;

function tableExist($database , $tableName)
{
    $b=false;
    $reponse = $database->query('show tables');
        while($data = $reponse->fetch())
        {
            if($data[0] == tableName )
            {
                $b = true;
            }
        }
        return $b;
    }
?>