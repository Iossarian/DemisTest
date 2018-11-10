<?php
require_once ('db.php');
require_once ('functions.php');

$sql = 'SELECT id, name, text, code FROM report';
$sql_result = mysqli_query($con, $sql);
$reports_array = mysqli_fetch_all($sql_result, MYSQLI_ASSOC);

$content = include_template('watch.php', [
    'reports_array' => $reports_array
]);
echo $content;
?>