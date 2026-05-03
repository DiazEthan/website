<?php

$hostName = "localhost";
$userName = "root";
$password = "";
$databaseName = "students";
$tableName = "diae_students";

$mysqli = new mysqli($hostName, $userName, $password, $databaseName);

if ($mysqli->connect_error) {
    die("<h2>Connect Error to $hostName: "
        . $mysqli->connect_error . "</h2>");
}

print("Connection successful to: <br />
hostName = $hostName <br />
databaseName = $databaseName<br /><br >");

print("<hr />");

/* Show Databases */
$query = "SHOW DATABASES";
$result = $mysqli->query($query);

if(!$result){
    die('Error running query [' . $mysqli->error . ']');
}

print("query \"$query\" successful!<br /><br />");

while($row = $result->fetch_assoc()){
    print_r($row);
    print("<br />");
}

print("<hr />");

/* Show Tables */
$query = "SHOW TABLES FROM $databaseName";
$result = $mysqli->query($query);

if(!$result){
    die('Error running query [' . $mysqli->error . ']');
}

print("query \"$query\" successful!<br /><br />");

while($row = $result->fetch_assoc()){
    print_r($row);
    print("<br />");
}

print("<hr />");

/* Show Table Data */
$query = "SELECT * FROM $tableName";

if(!$result = $mysqli->query($query)){
    die('Error running query [' . $mysqli->error . ']');
}

print("query \"$query\" successful!<br /><br />");

while($row = $result->fetch_assoc()){
    print(
        $row["name"] . " | " .
        $row["major"] . " | " .
        $row["gpa"] . " | " .
        $row["student_loans"] .
        "<br />"
    );
}

$mysqli->close();

?>