<?php

$myfile = fopen("notifications.txt", "a") or die("Unable to open file!");
$txt = file_get_contents('php://input');
fwrite($myfile, "\n\n" . $txt);
fwrite($myfile, "\n\n--------------");
fclose($myfile);