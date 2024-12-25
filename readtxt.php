<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>read textfile</title>
</head>
<body>
    <h1>ข้อมูลนักศึกษา PHP Open File - fopen()</h1>
<?php
    $myfile = fopen("myname.txt", "r") or die("Unable to open file!");
    echo fread($myfile,filesize("myname.txt"));
    fclose($myfile);
?>

    <h1>ข้อมูลนักศึกษา PHP Read Single Line - fgets()</h1>

<?php
    $myfile = fopen("myname.txt", "r") or die("Unable to open file!");
    echo fgets($myfile);
    fclose($myfile);
    ?>

    <h1>ข้อมูลนักศึกษา PHP Check End-Of-File - feof()</h1>

<?php
$myfile = fopen("myname.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>
</body>
</html>