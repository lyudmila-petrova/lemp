<a href="/">Back</a><BR>
<?php
print "Search by name: $_GET[name]<BR>";

$link = mysqli_connect("127.0.0.1", "web", "webpassword", "web");
mysqli_set_charset($link, "utf8");

$sql = "SELECT name, surname FROM users WHERE name = '$_GET[name]'";

$result = mysqli_query($link, $sql);

while ($row = mysqli_fetch_array($result)) {
    print("Name: " . $row['name'] . " Surname: " . $row['surname'] . "<br>");
}

