<!doctype html>
<html lang="en">

<?php
$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Snippets/Store/Head.inc";
include($path);
?>

<?php
if (isset($_GET['bg'])) {
  $bg =  $_GET['bg'];
} else {
  $bg =  "green";
}

//$bg =  "blue";
?>

<!-- Loading Style sheets-->
<link href="<?=$Parameter_URL ?>Snippets/Store/<?=$Parameter_SnippetURL ?>/Styling.css?v=<?=$Application_Version ?>" rel="stylesheet" type="text/css">

<body class="bg-<?= $bg ?>">

<div class="vh-100 vw-100 bg-base-dark">


      <div class="vh-100 vw-100" >
        <div id="Content" class="center w-100 ml-3 mr-3 pl-3 pr-3">
        <?php  
        $FetchedDataArray = fetch_PackageCluster("Wait Times", "");
        foreach($FetchedDataArray as $FetchedDataValue){ 
          ?>     
              <div class="text-center ">
                <p id="packagedata-<?= $FetchedDataValue['ID'] ?>" class="waittimes-title text-capitalize text-center w-100"><?= $FetchedDataValue['Package'] ?></p>
                <p id="valuedata-<?= $FetchedDataValue['ID'] ?>" class="waittimes-timings text-nowrap font-weight-bold text-capitalize text-center w-100">-</p>
              </div>

              <script>
                $(document).ready(function(){
                  
                  setInterval(function(){
                      $.ajax({
                          type: "POST",
                          url: 'AJAX-Data.php?package=<?= $FetchedDataValue['Package'] ?>',
                          dataType: "json",   
                          cache: false,   
                          success: function(data)
                          { 
                            $('#packagedata-<?= $FetchedDataValue['ID'] ?>').html(data.packagename);         
                            $('#valuedata-<?= $FetchedDataValue['ID'] ?>').html(data.packagevalue);     
                          },
                          error: function(data){
                              $('#packagedata').html("Error");
                              $('#valuedata').html("N/A");
                          }
                      });
                  }, 5000);
                });
              </script>

        <?php
          }
        ?> 
        
          <div class="m-0 p-0 footer text-capitalize text-center d-none">
                <div><?= "Last Updated: ".date("Y/m/d h:m") ?> / Refreshing in <strong><span id="time">--</span></strong></div>
            </div>
          </div>
        </div>
      </div>



 
      
 
      
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Snippets/Store/Footer.inc";
include($path);
?>



</body>