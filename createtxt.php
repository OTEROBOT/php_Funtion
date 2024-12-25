<?php
$myfile = fopen("newfile.txt", "a") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);

$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("myname.txt"));
    fclose($myfile);
?>