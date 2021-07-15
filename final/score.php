#!/usr/local/bin/php
<?php
header('Content-Type: text/plain; charset=utf-8');

$scoresFile = fopen('scores.txt', 'a');

if ($scoresFile) {
    fwrite($scoresFile, $_POST['username'] ." ". $_POST['score'] . "\n");
}
fclose($scoresFile);
echo $_POST['username'], $_POST['score'];
?>