
<?php
$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Parameters.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/functions.inc";
include($path);



$BuildQueryColumns="";
foreach($fetch_SQLFieldNames as $key=>$SQLFieldName){ 
  
  If ($SQLFieldName['Level'] == "1") {
    $BuildQueryColumns.= "[".$SQLFieldName['Name']."] ,";
  }
}
$BuildQueryColumns = substr($BuildQueryColumns, 0, -1);


function fetch_data(){
  global $conn;
  global $Parameter_SQL_TableOrView;
  global $BuildQueryColumns;

  $FetchSQLQuery = "SELECT $BuildQueryColumns 
      from $Parameter_SQL_TableOrView
      ORDER BY [ID] desc ";

  // echo $FetchSQLQuery."<br>";

  $FetchDB = $conn->prepare($FetchSQLQuery);
  $FetchDB->execute();
  return $FetchDB->fetchAll();

}


// Collect data
$FetchData = fetch_data();
// show data
show_data($FetchData);

function show_data($FetchedData){

  global $fetch_SQLFieldNames;

  // Get all column names

  $data = array();

  if(count($FetchedData)>0){
    $lineid=1;
    foreach($FetchedData as $FetchedItem){ 


      $sub_array = array('RowId' => $lineid);

      foreach($fetch_SQLFieldNames as $key=>$SQLFieldName){ 

        If ($SQLFieldName['Level'] == "1") {
          $CurrentItem = $FetchedItem[$SQLFieldName['Name']];
          switch($SQLFieldName['Name']) {
          case "ID";
            $itemID = $CurrentItem;  
            break;
          case "Date";
            $CurrentItem = date("d M Y h:m A", strtotime($CurrentItem));  
            $sub_array[] = "<td>".$CurrentItem."</td>";
            break;
          default:
            $CurrentItem = "$CurrentItem"; 
            $sub_array[] = "<td>".$CurrentItem."</td>";
            break;
          }
        }
      }
      $sub_array[] = "<td>
              <div class='btn-group'>
              <a class='btn btn-secondary text-nowrap mr-1' href='https://hubarasmp.northwestambulance.nhs.uk/Packages/' role='button' data-id='".$itemID."' ><i class='fas fa-pencil-alt fa-lg align-middle pr-2'></i>Edit</a>
              <a class='btn btn-secondary text-nowrap disabled' href='#' role='button' data-id='".$itemID."' ><i class='fad fa-trash-alt fa-lg  align-middle pr-2'></i>Delete</a>
              </div>
              </td>";
      $sub_array[] = "<td><a class='btn btn-primary' href='#' role='button' data-id='".$itemID."' data-title='Details' data-bs-toggle='modal' data-bs-target='#DetailsModal'><i class='fas fa-arrows-alt'></a></i></td>";

      $data[] = $sub_array;
        
      $lineid++; 
    }


    $output = array(

      'recordsTotal' => count($FetchedData),
      'recordsFiltered' => count($FetchedData),
      'data'  => $data
      
      );

      
  echo json_encode($output);

   
  } else {

    $data = "";
    
    $output = array(

      'recordsTotal' => 0,
      'recordsFiltered' => 0,
      'data'  => $data
      
      );

      echo json_encode($output);

  }

  
}




?>