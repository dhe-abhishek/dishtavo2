<?php

$sourceDB = new mysqli('localhost', 'root', '', 'dhe_test');
$destinationDB = new mysqli('localhost', 'root', '', 'dishtavo');

// Check connection
if ($sourceDB->connect_error || $destinationDB->connect_error) {
    die("Connection failed: " . $sourceDB->connect_error . ' ' . $destinationDB->connect_error);
}

// Select data from the source table


$sourceTable = 'dhe_web_admin';
echo "<BR>Lets copy allusers from ".$sourceTable;
$sourceQuery = "SELECT * FROM $sourceTable";
$sourceResult = $sourceDB->query($sourceQuery);

if (!$sourceResult) {
    die("Query failed: " . $sourceDB->error);
}

// Insert data into the destination table
$destinationTable = 'dsh2_user';
//$sourceTable = 'source_table'$sourceQuery = "SELECT id, field1, field2 FROM $sourceTable";
//$sourceResult = $sourceDB->query($sourceQuery);

//if (!$sourceResult) {
 //   die("Query failed: " . $sourceDB->error);
//}

// Insert data into the destination table and retrieve the inserted id
while ($row = $sourceResult->fetch_assoc()) {
    /*$fields = implode(', ', array_map(function ($key, $value) {
        return "$key = '" . mysqli_escape_string($value) . "'";
    }, array_keys($row), $row));*/

    $isApproved = ($row['is_approved'] == 'Y')? 1:0;
    $isActive = ($row['is_active'] == 'Y')? 1:0;

   $fields = "username = '" .$row['user_name'] . "', password = '" .$row['pass_word'] . "', firstname = '" .$row['firstname'] . "', lastname = '" .$row['lastname'] . "', mobile = '" .$row['mobile'] . "', email = '" .$row['email'] . "', created_at = '" .$row['ts'] . "', is_approved = " .$isApproved . ", is_active = " .$isActive . "";
    
    print "<BR>".$destinationQuery = "INSERT INTO $destinationTable SET $fields";
    
    $destinationResult = $destinationDB->query($destinationQuery);
    
    if (!$destinationResult) {
       print ("<BR>Insert failed: " . $destinationDB->error);
    }
    else{
        print "<BR>Inserted successfully";
    }

    // Retrieve the inserted id
    $insertedId = $destinationDB->insert_id;

    // Use $insertedId for further entries
    // ...
    
    $roleQuery = "INSERT INTO `dsh2_user_role` SET user_id=".$insertedId.", role_id = 1" ;
    $roleResult = $destinationDB->query($roleQuery);

    echo "<BR>Data copied successfully from $sourceTable to $destinationTable with id $insertedId.\n";
}

// Close connections
$sourceDB->close();
$destinationDB->close();

echo "Data copied successfully from $sourceTable to $destinationTable.";

?>
