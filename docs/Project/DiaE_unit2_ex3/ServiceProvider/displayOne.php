<?php

include('class_lib/studentDB_Access.php');

print("<h2>Display One Student Record</h2>");

if(isset($_GET['id'])){

    $id = $_GET['id'];
    $table = "diae_students";

    $DB_Access = new DiaE_DB_Access();

    $record = $DB_Access->selectOne($table, $id);

    print("<hr />");

    if($record != null){

        print("Record Found:<br /><br />");

        print(
            "ID: " . $record["id"] . "<br />" .
            "Name: " . $record["name"] . "<br />" .
            "Major: " . $record["major"] . "<br />" .
            "GPA: " . $record["gpa"] . "<br />" .
            "Student Loans: $" . $record["student_loans"]
        );

    }
    else{

        print("Error: No record found for ID = $id");

    }

}
else{

    print("Error: No ID received.");

}

?>