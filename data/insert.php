<a href="/">Back</a><BR>

<?php
$link = mysqli_connect("127.0.0.1", "web", "webpassword", "web");

if ($link == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

mysqli_set_charset($link, "utf8");

$sql = 'CREATE TABLE users (name varchar(25), surname varchar(25));';
$result = mysqli_query($link, $sql);

if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
}

$sql = 'INSERT INTO users VALUES ("Harry","Potter");';
$result = mysqli_query($link, $sql);

if ($result == false) {
    print("Произошла ошибка при выполнении запроса");
}

