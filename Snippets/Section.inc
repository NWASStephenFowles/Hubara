<?php

$Suite = "Snippets";

$Parameter_SQL_TableOrView = "v_Data_Snippets";

$Parameter_SQL_JSONColumns = file_get_contents("./Columns.json");
$fetch_SQLFieldNames = json_decode($Parameter_SQL_JSONColumns,true);


function fetch_SQLFieldNames(){

  global $conn;
  Global $Parameter_SQL_TableOrView;

  $FetchFieldNamesDB = $conn->prepare("SELECT Name FROM sys.columns WHERE object_id = OBJECT_ID('".$Parameter_SQL_TableOrView."') ORDER BY Name ");
  $FetchFieldNamesDB->execute();

  return $FetchFieldNamesDB->fetchAll();

}




?>