<?php
require_once ('db.php');
require_once ('functions.php');


$content = include_template('index.php', [

]);
echo $content;
?>