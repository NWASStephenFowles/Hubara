<!doctype html>
<html lang="en">

<?php
$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Snippets/Store/Head.inc";
include($path);
?>

<!-- Loading Style sheets-->
<link href="<?=$Parameter_URL ?>Snippets/Store/<?=$Parameter_SnippetURL ?>/Styling.css?v=<?=$Application_Version ?>" rel="stylesheet" type="text/css">

<body>

<div class="vh-100 vw-100 bg-base-dark">


        <?php  
      $FetchedDataArray = fetch_Package("National Threat Level", "");
      foreach($FetchedDataArray as $FetchedDataValue){ 

      switch($FetchedDataValue['Value']) {
        case "Moderate";
          $LevelColour="NTL-Moderate";
          break;
        case "3";
          $LevelColour="NTL-Moderate";
          break;
        default:
          $LevelColour="REAP-1";
          break;
        }

          ?>     
            <div class="vh-100 vw-100 <?=$LevelColour ?>" >
            

              <div id="Content" class="center pb-3">
                <div class="text-center ">
                  <p id="packagedata" class="NTL-title mb-0 pt-4 text-capitalize text-center vw-100">National Threat Level</p>
                  <p id="valuedata" class="NTL-level text-nowrap m-0 font-weight-bold text-capitalize text-center">Loading</p>
                </div>
                
                  <div class="m-0 p-0 footer text-capitalize text-center d-none">
                        <div><?= "Last Updated: ".date("Y/m/d h:m") ?> / Refreshing in <strong><span id="time">--</span></strong></div>
                    </div>
                  </div>
            </div>

        </div>
      <?php
        }
      ?> 


<script>
        $(document).ready(function(){
          
          setInterval(function(){
              $.ajax({
                  type: "POST",
                  url: 'AJAX-Data.php?package=National Threat Level',
                  dataType: "json",   
                  cache: false,   
                  success: function(data)
                  { 
                    $('#packagedata').html(data.packagename);         
                    $('#valuedata').html(data.packagevalue);     
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
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Snippets/Store/Footer.inc";
include($path);
?>
      



</body>