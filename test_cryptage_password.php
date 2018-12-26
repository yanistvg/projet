<?php
$phrase = "test";
$c = cryptage($phrase);
echo $c;


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
    $conpareson = 'abc';
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
?>