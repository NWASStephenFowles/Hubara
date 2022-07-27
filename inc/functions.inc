
<?php
// Database Connection 
$dsn = "sqlsrv:Server=$Parameter_SQL_ServerName,1433;Database=$Parameter_SQL_Database";
$conn = new PDO($dsn, $Parameter_SQL_UserID, $Parameter_SQL_Password);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

?>

<?php
function fetch_DataClusters($Cluster, $Section, $Data1){

  global $conn;

  If ($Section != "") {
    $SectionString = "AND [Lookup] = '".$Section."' ";
  } else {
    $SectionString = " ";
  }

  $Data1 = (int)$Data1;

  If ($Data1 != "0") {
    $Data1String = "AND [Data 1] <= '".$Data1."' ";
  } else {
    $Data1String = " ";
  }
  
  // Query for execution
  $FetchSQLQuery = "SELECT * FROM tbl_Data_Clusters 
    WHERE [Cluster] = '".$Cluster."' ".$SectionString." ".$Data1String." 
    AND [Active] = '1' ORDER BY [Value] ";

  // echo $FetchSQLQuery."<br>"; 

  $fetch_DataClustersDB = $conn->prepare($FetchSQLQuery);
  $fetch_DataClustersDB->execute();

  return $fetch_DataClustersDB->fetchAll();


}
?>


<?php
function fetch_Package($Package, $Data1){

  global $conn;

  $Data1 = (int)$Data1;

  If ($Data1 != "0") {
    $Data1String = "AND [Data 1] <= '".$Data1."' ";
  } else {
    $Data1String = " ";
  }
  
  // Query for execution
  $FetchSQLQuery = "SELECT * FROM v_Data_Packages 
    WHERE [Package] = '".$Package."'
    $Data1String  ";

  // echo $FetchSQLQuery."<br>"; 

  $fetch_PackageDB = $conn->prepare($FetchSQLQuery);
  $fetch_PackageDB->execute();

  return $fetch_PackageDB->fetchAll();


}
?>


<?php
function fetch_PackageCluster($PackageCluster, $Data1){

  global $conn;

  $Data1 = (int)$Data1;

  If ($Data1 != "0") {
    $Data1String = "AND [Data 1] <= '".$Data1."' ";
  } else {
    $Data1String = " ";
  }
  
  // Query for execution
  $FetchSQLQuery = "SELECT * FROM v_Data_Packages 
    WHERE [Cluster] = '".$PackageCluster."'
    $Data1String  ";

  // echo $FetchSQLQuery."<br>"; 

  $fetch_PackageDB = $conn->prepare($FetchSQLQuery);
  $fetch_PackageDB->execute();

  return $fetch_PackageDB->fetchAll();


}
?>