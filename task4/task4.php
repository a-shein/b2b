<?php

declare(strict_types=1);
//----------------------------------------------------------------------------

// todo Как было:

function load_users_data($user_ids) {
    $user_ids = explode(',', $user_ids);
    foreach ($user_ids as $user_id) {
        $db = mysqli_connect("localhost", "root", "123123", "database");
        $sql = mysqli_query($db, "SELECT * FROM users WHERE id=$user_id");
        while($obj = $sql->fetch_object()){
            $data[$user_id] = $obj->name;
        }
    mysqli_close($db);
    }
    return $data;
}
// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
$data = load_users_data($_GET['user_ids']);
foreach ($data as $user_id=>$name) {
    echo "<a href=\"/show_user.php?id=$user_id\">$name</a>";
    }
//----------------------------------------------------------------------------

//todo Стало:

/**
 * Переменные и имя функции названы не по psr через snake_case. Должны быть в camelCase
 * type hinting
 *
 * @param mysqli $db
 * @param string $userIds
 * @return array
 */
function loadUsersData(mysqli $db, string $userIds): array
{
    $userIds = explode(',', $userIds);

    $data = [];
    foreach ($userIds as $userId) {
        /**
         * Считаем, что id в базе у users - это int. Если это не так - выходим, чтобы не делать лишний запрос в базу
         * Так же можно экранировать входящее значение функцией htmlspecialchars(), для избежания SQL-инъекций
         */
        if (gettype($userId) !== 'integer') {
            continue;
        }

        $sql = mysqli_query($db, "SELECT * FROM users WHERE id = $userId");
        $obj = $sql->fetch_object();
        /** Заменен while на if, чтобы избежать вечного цикла */
        if ($obj) {
            /** если свойства name нет - сетим дефолтное значение */
            $data[$userId] = $obj->name ?? 'Безымянный';
        }
    }

    return $data;
}

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
/** мы не знаем, что это за слой, коннект делать к базе или здесь или получать из отдельного сервиса */
$db = mysqli_connect("localhost", "root", "123123", "database");
$data = loadUsersData($db, $_GET['user_ids']);
mysqli_close($db);

foreach ($data as $userId => $name) {
    echo "<a href=\"/show_user.php?id=$userId\">$name</a>";
}
