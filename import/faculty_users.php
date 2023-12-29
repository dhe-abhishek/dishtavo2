<?php

$sourceDB = new mysqli('localhost', 'root', '', 'dhe_test');
$destinationDB = new mysqli('localhost', 'root', '', 'dishtavo');

// Check connection
if ($sourceDB->connect_error || $destinationDB->connect_error) {
    die("Connection failed: " . $sourceDB->connect_error . ' ' . $destinationDB->connect_error);
}

// Select data from the source table


$sourceTable = 'dhe_teacher';
echo "<BR><B>Lets copy all users from ".$sourceTable."</b>";
$sourceQuery = "SELECT t.*, d.college_id, d.toapp, d.designation, d.from_date, d.to_date, d.ts as dcreated FROM $sourceTable as t INNER JOIN dhe_teacher_details as d ON d.faculty_id = t.id LIMIT 10";
$sourceResult = $sourceDB->query($sourceQuery);

if (!$sourceResult) {
    die("Query failed: " . $sourceDB->error);
}

// Insert data into the destination table
$destinationTable = 'dsh2_user';

$cnt = 1;
// Insert data into the destination table and retrieve the inserted id
while ($row = $sourceResult->fetch_assoc()) {
    
    print "<BR/>".$cnt;
    /*$fields = implode(', ', array_map(function ($key, $value) {
        return "$key = '" . mysqli_escape_string($value) . "'";
    }, array_keys($row), $row));*/

   // $isApproved = ($row['is_approved'] == 'Y')? 1:0;
    $isActive = ($row['is_active'] == 'Y')? 1:0;

   $fields = "username = '" .$row['email'] . "', password = '" .$row['pass_word'] . "', salutation = '" .$row['sal'] . "', firstname = '" .$row['firstname'] . "', lastname = '" .$row['lastname'] . "', mobile = '" .$row['mobile'] . "', email = '" .$row['email'] . "', created_at = '" .$row['ts'] . "', is_approved = 1, is_active = " .$isActive . "";
    
    print "<BR/>".$destinationQuery = "INSERT INTO $destinationTable SET $fields";

    $destinationResult = $destinationDB->query($destinationQuery);
    
    if (!$destinationResult) {
       print ("<BR>Insert failed: " . $destinationDB->error);
    }
    else{
        print "<BR>Inserted successfully";
    }
    

    // Retrieve the inserted id
    $insertedId = $destinationDB->insert_id;


    //---------------------------------------------------------------------------------------------------------------
    //
    $desigQuery = "SELECT * FROM `dsh2_designation` WHERE name = '".trim($row['designation'])."' limit 1" ;
    $designationResult = $destinationDB->query($desigQuery);
    $designationRow = $designationResult->fetch_assoc();

    //print_r($designationRow);

    if(!$designationRow){
        print "<BR>Inserting designation";

        $designMasterQuery = "INSERT INTO `dsh2_designation` SET name='".trim($row['designation'])."'" ;
        $desigResult = $destinationDB->query($designMasterQuery);
        $designationID = $destinationDB->insert_id;
    }
    else{
        $designationID = $designationRow['id'];  
    }
    //------------------------------
    //---------------------------------------------------------------------------------------------------------------
    //
   /* $appoQuery = "SELECT * FROM `dsh2_appointment_type` WHERE name = '".trim($row['toapp'])."' limit 1" ;
    $appoResult = $destinationDB->query($appoQuery);
    $appoRow = $appoResult->fetch_assoc();

    //print_r($designationRow);

    if(!$appoRow){
        print "<BR>Inserting designation";

        $designMasterQuery = "INSERT INTO `dsh2_appointment_type` SET name='".trim($row['toapp'])."'" ;
        $desigResult = $destinationDB->query($designMasterQuery);
        $designationID = $destinationDB->insert_id;
    }
    else{
        $appTypeID = $appoRow['id'];  
    }*/

    $appointmentType = (trim($row['toapp']) == 'Regular')? 'Regular':((trim($row['toapp']) == 'Lecture Basis' || trim($row['toapp']) == 'Lecture')? 'Lecture Basis': ((trim($row['toapp']) == 'Contract')? 'Contract':'Other'));
    //------------------------------

    // Use $insertedId for further entries
 
    print "<BR/><BR/>".$facultyDetailsQry = "INSERT INTO `dsh2_faculty` SET `user_id`=".$insertedId.", `college_id`=".$row['college_id'].", `current_appointment_type`=".$appointmentType.", `current_designation_id`=".$designationID.", `from_date`='".$row['from_date']."', `to_date`='".$row['to_date']."', `created_at`='".$row['dcreated']."'" ;
    $facultyDetailsRes = $destinationDB->query($facultyDetailsQry);

    print ($facultyDetailsRes)? "<BR/>Faculy details added":"<BR>Error adding faculty details ";
    
    $roleQuery = "INSERT INTO `dsh2_user_role` SET user_id=".$insertedId.", role_id = 5" ;
    $roleResult = $destinationDB->query($roleQuery);

    if ($row['user_type'] == 'Faculty_co') {
        $roleQuery = "INSERT INTO `dsh2_user_role` SET user_id=".$insertedId.", role_id = 6" ;
        $roleResult = $destinationDB->query($roleQuery);
    }

    echo "<BR>Data copied successfully from $sourceTable to $destinationTable with id $insertedId.\n";
    $cnt++;
}

// Close connections
$sourceDB->close();
$destinationDB->close();
echo "<BR/>Total records copied: ".($cnt-1);
echo "<BR/>Data copied successfully from $sourceTable to $destinationTable.";

?>
