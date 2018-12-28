<?php
$phrase = "123456789";
$c = cryptage($phrase);
echo $c;


function cryptage($phrase) 
{
    $i = 0;
    $val=0;
    $nombreCrypt=1;
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
        $nombreCrypt++;
        $i++;
    }
    $phrase = substr($phrase, 0, $buf);
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
        $nombreCrypt++;
    }
    $conpareson = '504';
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
        $nombreCrypt++;
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
        $nombreCrypt++;
        $i++;
    }
    $conpareson = '404';
    $buffer = substr($phrase, 0, 3);
    while (strcmp($buffer, $conpareson))
    {
        $phrase = md5($phrase);
        $buffer = substr($phrase, 0, 3);
        $nombreCrypt++;
    }
    echo '<p>'.$nombreCrypt.'</p>';
    return $phrase;
}
?>