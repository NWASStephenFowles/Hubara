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
      $FetchedDataArray = fetch_Package("REAP Level", "");
      foreach($FetchedDataArray as $FetchedDataValue){ 

      switch($FetchedDataValue['Value']) {
        case "4";
          $LevelColour="REAP-4";
          $LevelDescription="EXTREME PRESSURE";
          break;
        case "3";
          $LevelColour="REAP-3";
          $LevelDescription="MAJOR PRESSURES";
          break;
        default:
          $LevelColour="REAP-1";
          $LevelDescription="N/A";
          break;
        }

          ?>     
            <div class="vh-100 vw-100 <?=$LevelColour ?>" >
            

              <div id="Content" class="center pb-3">
                <div class="text-center ">
                  <p class="REAP-title mb-0 pt-4 text-capitalize text-center vw-100">REAP LEVEL</p>
                  <p class="REAP-description text-nowrap m-0 font-weight-bold text-capitalize text-center"><?=$LevelDescription ?></p>
                </div>
                <div class="">
                  <h6 class="m-0 p-0 REAP-number text-capitalize text-center"><?=$FetchedDataValue["Value"] ?></h6>
                </div>
                <div class="m-0 p-0 footer text-capitalize text-center d-none">
                    <div><?= "Last Updated: ".date("Y/m/d h:m") ?> / Refreshing in <strong><span id="time">--</span></strong></div>
                </div>
            </div>

        </div>
      <?php
        }
      ?> 



 
      
<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Snippets/Store/Footer.inc";
include($path);
?>

</body>