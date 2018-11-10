<?php
require_once ('db.php');
require_once ('functions.php');

$search = trim($_GET['search']);
$safe_search = mysqli_real_escape_string($con, $search);
$error = [];
if ($safe_search && $safe_search !== '') {
    $sql = "SELECT name, text, code FROM report"
            . " WHERE code LIKE '%" . $safe_search . "%'";

    $stmt = mysqli_query($con, $sql);
    $reports =  mysqli_fetch_all($stmt, MYSQLI_ASSOC);

    if (!count($reports)) {
        $error['search'] = 'По вашему запросу ничего не найдено';
    }

}
if (empty($search)) {
    $error['search'] = 'Введите поисковой запрос';
    }

$content = include_template('search.php', [
    'reports' => $reports ?? '',
    'safe_search' => $safe_search,
    'error' => $error ?? ''
]);
echo $content;
?>