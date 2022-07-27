<?php
$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Parameters.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/functions.inc";
include($path);
?>

<?php  
if (isset($_GET['package'])) {
  $package =  $_GET['package'];
}
?>

<?php  
$FetchedDataArray = fetch_Package($package, "");
foreach($FetchedDataArray as $FetchedDataValue){ 

    $Package = $FetchedDataValue['Package']; 
    $Value = $FetchedDataValue['Value'];

}

$output = array(

    'packagename' => $Package,
    'packagevalue' => $Value,
    
    );


echo json_encode($output);
?> 
