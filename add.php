<?php
require_once ('db.php');
require_once ('functions.php');

$data = $_POST;
$errors = [];
if (isset($data['add'])) {
    if (empty($data['name'])) {
        $errors['name'] = 'Введите имя расчета';
    }
    if (empty($data['text'])) {
        $errors['text'] = 'Введите текст расчета';
    }
    if (empty($errors)) {
        $sql = 'INSERT INTO report (name, text, code) VALUES (?, ?, ?)';
        $stmt = db_get_prepare_stmt($con, $sql, [$data['name'], $data['text'], implode(',', find($data['text']))]);
        $res = mysqli_stmt_execute($stmt);
    }
}

$content = include_template('add.php', [
    'errors' => $errors ?? [],
    'data' => $data
]);
echo $content;
?>