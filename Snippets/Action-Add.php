<?php

$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/AppRelease.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Parameters.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/functions.inc";
include($path);


$Group = $_POST['Group'];
$ExpireDate = $_POST['ExpireDate'];
$Type = $_POST['Type'];
$Title = $_POST['Title'];
$Message = $_POST['Message'];
$URL = $_POST['URL'];

$Date = date('d/m/Y H:i:s');

$Author = $_SERVER['AUTH_USER'];
$Author = str_replace("NWAMB\\", "", $Author);




$Insert_Query = "INSERT INTO [tbl_Data_Messages]  
([Posted Date], [Author], [End Date], [Type], [Title], [Message], [URL], [Active]) 
VALUES ('$Date', '$Author', '$ExpireDate', '$Type', '$Title', '$Message', '$URL', '1') ";

echo "<br><br><br>".$Insert_Query."<br><br><br>";

$log_action = $conn->prepare($Insert_Query);


$log_action->execute();


//log_Usage($Suite, "1003", "Audit Update", "Added ".$Master_ePR_ID." to ".$BatchID." by ".$Author);




echo "1";

?>