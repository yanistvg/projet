<?php
SESSION_START();
if (!isset($_SESSION["user"]) && !isset($_GET["user"]))
    form();
elseif(isset($_SESSION["pass"]) || isset($_GET["pass"]))
    if(isset($_GET["user"]) && $_GET["user"]=="admin" && isset($_GET["pass"]) && $_GET["pass"] == "1234")
    {
        $_SESSION["user"] = $_GET["user"];
        $_SESSION["pass"] = $_GET["pass"];
    }
elseif ($_SESSION["user"]=="admin" && $_SESSION["pass"] == "1234")
{
    if (isset($_GET["crypt"]))
        echo cryptage($_GET["crypt"]);
    else
        form2();
}
else
    header("test_cryptage_password.php");

function cryptage($phrase)
{
    $i = 0;
    $val=0;
    $conpareson = '404';
    $buf = strlen($phrase);
    $phrase = sha1($phrase);
    while ($i<strlen($phrase))
    {
        if (is_numeric($phrase[$i]))
        {
            $val += $phrase[$i];
        }
        $i++;
    }
    $i=0;
    while ($i < $val)
    {
        $phrase = sha1($phrase);
        $i++;
    }
    $phrase = substr($phrase, 0, $buf);
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
    }
    $conpareson = '504';
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
    }
    $i=0;
    $val=0;
    while ($i<strlen($phrase))
    {
        if (is_numeric($phrase[$i]))
        {
            $val += $phrase[$i];
        }
        $i++;
    }
    $i=0;
    while ($i < $val)
    {
        $phrase = sha1($phrase);
        $i++;
    }
    $conpareson = '404';
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
    }
    return $phrase;
}

function form()
{
    ?>
        <form action="#" method="GET">
            <label>username : </label>
            <input name="user"><br />
            <label>password : </label>
            <input type="password" name="pass">
            <input type="submit">
        </form>
    <?php
}

function form2()
{
    ?>
        <form action="#" method="GET">
            <label>mot de passe a crypté : </label>
            <input name="crypt"><br />
            <input type="submit">
        </form>
    <?php
}
?>