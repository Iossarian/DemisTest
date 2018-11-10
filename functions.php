<?php
require_once ('db.php');

/**
 * //Функция-шаблонизатор
 * @param $name
 * @param $data
 * @return false|string
 */
function include_template($name, $data) {
    $name = 'templates/' . $name;
    $result = '';
    if (!file_exists($name)) {
        return $result;
    }
    ob_start();
    extract($data);
    require_once $name;
    $result = ob_get_clean();
    return $result;
}
/**
 * Создает подготовленное выражение на основе готового SQL запроса и переданных данных.
 *
 * @param mysqli $con Ресурс соединения
 * @param string $sql  SQL запрос с плейсхолдерами вместо значений
 * @param array  $data Данные для вставки на место плейсхолдеров
 *
 * @throws \UnexpectedValueException Если тип параметра не поддерживается
 *
 * @return mysqli_stmt Подготовленное выражение
 */
function db_get_prepare_stmt(mysqli $con, string $sql , array $data = [])
{
    $stmt = mysqli_prepare($con, $sql );
    if (empty($data)) {
        return $stmt;
    }
    static $allowed_types = [
        'integer' => 'i',
        'double' => 'd',
        'string' => 's',
    ];
    $types = '';
    $stmt_data = [];
    foreach ($data as $value) {
        $type = gettype($value);
        if (!isset($allowed_types[$type])) {
            throw new \UnexpectedValueException(sprintf ('Unexpected parameter type "%s".', $type));

        }
        $types .= $allowed_types[$type];
        $stmt_data[] = $value;
    }
    mysqli_stmt_bind_param($stmt, $types, ...$stmt_data);
    return $stmt;
}

function find($str) {
    $str = str_split($str);
    $inc = false; $tempStr = null;
    foreach($str as $v) {
        if ($v == '}' && !empty($tempStr)) {
            $finalArr[] = $tempStr;
            $inc = false; $tempStr = null;
        }
        if ($inc) {
            if (is_numeric($v)) {
                $tempStr .= $v;
            } elseif ($v == '-') {
                $tempStr .= $v;
            } elseif ($v == '+') {
                $tempStr .= $v;
            }
            else {
                $inc = false; $tempStr = null;
            }
        }
        if ($v == '{') {
            $inc = true;
        }


    }
    return $finalArr;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>