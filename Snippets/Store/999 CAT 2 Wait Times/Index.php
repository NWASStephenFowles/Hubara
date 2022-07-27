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
              <div class="text-center ">
                <p id="packagedata" class="waittimes-title m-0 text-capitalize text-center w-100">CAT 2 Wait Times</p>
                <p id="valuedata" class="waittimes-timings m-0 text-nowrap font-weight-bold text-capitalize text-center w-100">-</p>
              </div>
        
          <div class="m-0 p-0 footer text-capitalize text-center d-none">
                <div><?= "Last Updated: ".date("Y/m/d h:m") ?> / Refreshing in <strong><span id="time">--</span></strong></div>
            </div>
          </div>

        </div>
      </div>


<script>
  $(document).ready(function(){
    
    setInterval(function(){
        $.ajax({
            type: "POST",
            url: 'AJAX-Data.php?package=CAT 2 Wait Times',
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