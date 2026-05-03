<?php

include('class_lib/studentDB_Access.php');

print("<h2>Display All Student Records</h2>");

$table = "diae_students";

$DB_Access = new DiaE_DB_Access();

$result = $DB_Access->displayRecords($table);

print("<hr />");

if($result->num_rows > 0){

    while($row = $result->fetch_assoc()){

        print(
            "ID: " . $row["id"] . " | " .
            "Name: " . $row["name"] . " | " .
            "Major: " . $row["major"] . " | " .
            "GPA: " . $row["gpa"] . " | " .
            "Student Loans: $" . $row["student_loans"] .
            "<br /><br />"
        );

    }

}
else{

    print("No records found.");

}

?>