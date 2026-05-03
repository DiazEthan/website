<?php

include('class_lib/studentDB_Access.php');

print("<h3>");

$DB_Access = new DiaE_DB_Access();

print("<hr />");

/* Show Databases */
$DB_Result = $DB_Access->showDatabases();

$rValue = "List of Databases in MySQL: <br />";

while($row = $DB_Result->fetch_assoc()) {

    foreach($row as $value) {
        $rValue .= "$value <br />";
    }
}

print($rValue);


print("<hr />");

/* Show Tables */
$DB_Result = $DB_Access->showTables();

$rValue = "List of Tables in students database: <br />";

while($row = $DB_Result->fetch_assoc()) {

    foreach($row as $value) {
        $rValue .= "$value <br />";
    }
}

print($rValue);


print("<hr />");

/* Show Records From Your Table */
$table = "diae_students";

$DB_Result = $DB_Access->displayRecords($table);

$rValue = "List of Records from " . $table . " table<br />";

while($row = $DB_Result->fetch_assoc()) {

    foreach($row as $value) {
        $rValue .= "$value ";
    }

    $rValue .= "<br />";
}

print($rValue);

print("<hr />");

$table = "diae_students";
$id = 2;

$record = $DB_Access->selectOne($table, $id);

$rValue = "Record returned from selectOne() for ID = $id <br /><br />";

if($record != null){
    foreach($record as $value){
        $rValue .= "$value ";
    }
 } else {
        $rValue .= "No record found.";
    }



print($rValue);


print("</h3>");

?>