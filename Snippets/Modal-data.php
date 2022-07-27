<?php

$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Parameters.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/functions.inc";
include($path);

$response = "";
$lineid = 0;
if(isset($_GET['ID'])){

  $lineid = $_GET['ID'];
  

  $BuildQueryColumns="";
  foreach($fetch_SQLFieldNames as $key=>$SQLFieldName){ 
    $BuildQueryColumns.= "[".$SQLFieldName['Name']."] ,";
  }
  $BuildQueryColumns = substr($BuildQueryColumns, 0, -1);
  

  $FetchSQLQuery = "SELECT $BuildQueryColumns
  from $Parameter_SQL_TableOrView 
  where [ID] = '$lineid' ";


  // echo $FetchSQLQuery."<br>";

  $FetchDB = $conn->prepare($FetchSQLQuery);
  $FetchDB->execute();
  $resultArray = $FetchDB->fetchAll();  

  $response = "<table class='table table-striped border border-primary'>";
  
  $response.= "<thead class='bg-dark text-light'>";
  $response.= "<tr>";
  $response.= "<th class='text-center align-middle'>Item</th><th class='text-center align-middle'>Contents</th>";
  $response.= "</tr>";
  $response.= "</thead>";
  $response.= "<tbody class='text-dark'>";


  foreach($resultArray as $resultItem){ 

    foreach($fetch_SQLFieldNames as $key=>$SQLFieldName){ 

          $CurrentItem = $SQLFieldName['AS'];
          switch($SQLFieldName['AS']) {
          case "URL";
            $CurrentItem = $Parameter_URL."Snippets/Store/".$resultItem[$SQLFieldName['Name']]."/";
            
            $response.= "<tr>";
            $response.= "<th class='p-1'>".$SQLFieldName['AS']."</th><td class='p-1'>".$CurrentItem."</td>";
            $response.= "</tr>";

            $response.= "<tr>";
            $response.= "<th class='p-1'>".$SQLFieldName['AS']." (Green)</th><td class='p-1'>".$CurrentItem."?bg=green</td>";
            $response.= "</tr>";

            $response.= "<tr>";
            $response.= "<th class='p-1'>".$SQLFieldName['AS']." (Yellow)</th><td class='p-1'>".$CurrentItem."?bg=yellow</td>";
            $response.= "</tr>";
            $response.= "<tr>";

            $response.= "<th class='p-1'>".$SQLFieldName['AS']." (Blue)</th><td class='p-1'>".$CurrentItem."?bg=blue</td>";
            $response.= "</tr>";
          break;
          default:
            $CurrentItem = $resultItem[$SQLFieldName['Name']]; 
            
            $response.= "<tr>";
            $response.= "<th class='p-1'>".$SQLFieldName['AS']."</th><td class='p-1'>".$CurrentItem."</td>";
            $response.= "</tr>";

            break;
          }
      
    }

    $response.= "<tr class='d-none'>";
    $response.= "<th class='p-1'>Copy</th><td class='p-1'>";
    $response.= "<button class='btn btn-secondary mr-2' onclick='copyURL('green')'>green backgrounds</button>";
    $response.= "<button class='btn btn-secondary mr-2' onclick='copyURL('yellow')'>yellow backgrounds</button>";
    $response.= "<button class='btn btn-secondary' onclick='copyURL('blue')'>blue backgrounds</button>";
    $response.= "</td>";
    $response.= "</tr>";

  }
  $response.= "</tbody></table>";


  // $response= "test";

 } else {

  $response="No data.";
}


echo $response;
?>