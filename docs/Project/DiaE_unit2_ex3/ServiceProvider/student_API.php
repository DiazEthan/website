<?php

include('class_lib/studentDB_Access.php');

$DB_Access = new DiaE_DB_Access();

$action = $_GET['action'] ?? '';
$table = "diae_students";

/* GET ALL RECORDS */
if($action == "getAll"){

    $result = $DB_Access->displayRecords($table);

    $data = array();

    while($row = $result->fetch_assoc()){
        $data[] = $row;
    }

    echo json_encode($data);
}

/* GET ONE RECORD */
elseif($action == "getOne"){

    $id = $_GET['id'] ?? 0;

    $record = $DB_Access->selectOne($table, $id);

    echo json_encode($record);
}

/* ERROR */
else{
    echo json_encode(array("error" => "Invalid action"));
}

?>