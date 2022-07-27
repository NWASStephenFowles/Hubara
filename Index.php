<!doctype html>
<html lang="en">

<?php
$Suite = "Resources";
$Module = "Welcome";

$HeaderTitle = $Module;
?>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Head.inc";
include($path);
?>


<div class="container-fluid ">

<div class="" id="wrapper">

  

  <!-- Page Content -->
  <div id="page-content-wrapper" class="">
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/inc/Header.inc";
    include($path);
    ?>
    <div class="vh-100 bg-base-dark">

      <div id="Grid" class="grid-layout">

        <div id="GRID" class="d-flex justify-content-center flex-nowrap ">
          
            <?php
              $NavDB = $conn->prepare("SELECT * FROM [v_Global_Navigation] WHERE [Spoke] = '".$Parameter_AppSiteID."' AND [Title] <> 'Home' AND [Active] = '1' ORDER BY [Order] ");
              $NavDB->execute();
              $NavArray = $NavDB->fetchAll();
            ?>
            <div class="row pb-4 ">
              <?php  
                foreach ($NavArray as $NavItem) {

                  if (str_starts_with($NavItem["URL"], 'http')) {
                    $NavURL = $NavItem["URL"];
                  } else {
                    $NavURL = $Parameter_URL.$NavItem["URL"];
                  }
              ?>    
                <a class="nav-item text-decoration-none" href="<?=$NavURL ?>">
                  <div class="card mr-5 mb-2 text-center shadow rounded bg-secondary text-dark font-weight-bold nav-h nav-w" >
                    <img class="card-img-top" src="<?=$Parameter_URL ?>img/nav/<?=$NavItem["Title"] ?>.jpg" alt="Card image cap">  
                    <div class="card-body text-center">
                      <h2 class="card-title  pt-2"><?=$NavItem["Title"] ?></h2>
                      <p class="card-title nav-d text-center"><?=$NavItem["Description"] ?></p>
                      <div class="slider">
                        <img class="" src="<?=$Parameter_URL ?>img/nav/<?=$NavItem["Title"] ?>.png" alt="">  
                        <p class="slider-text nav-d text-center"><?=$NavItem["Description"] ?></p>
                      </div>
                    </div>
                  </div>
                </a>

              <?php  
              }
              ?>    


              </div>

                      
        </div>
        

        
      </div>


    </div>
  </div>
  <!-- /#page-content-wrapper -->


<!-- /#wrapper -->


<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Footer.inc";
include($path);
?>

</div>
</body>





<!-- Batch Status Modal -->
<div class="modal fade" id="SelectionModal" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="modalTitle">Close</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" id="SelectForm" name="SelectForm">
        <div class="modal-body">
          
          <div class="mb-1 <?= $Parameter_Debug ?>">
                <label for="source" class="col-form-label">source:</label>
                <input readonly required type="text" class="form-control" id="source" name="source" value="">
          </div>
          
          <div class="mb-1 <?= $Parameter_Debug ?>">
                <label for="lookup" class="col-form-label">lookup:</label>
                <input readonly required type="text" class="form-control" id="lookup" name="lookup" value="">
          </div>
          
          <div class="mb-1 <?= $Parameter_Debug ?>">
                <label for="destination" class="col-form-label">destination:</label>
                <input readonly required type="text" class="form-control" id="destination" name="destination" value="">
          </div>

        <div id="Selection_Details"></div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
          <button id="Select" type="button" class="btn btn-primary">Select</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>

  $(document).ready(function() {

    $("#SelectionModal").on("show.bs.modal", function(btn){
      var triggerLink = $(btn.relatedTarget);
      var source = triggerLink.data("source");
      var lookup = triggerLink.data("lookup");
      var destination = triggerLink.data("destination");

      $('#source').val(source);
      $('#lookup').val(lookup);
      $('#destination').val(destination);
      lookup = lookup.replace(' ', '+');

      $('#modalTitle').html(destination);

      $(this).find('#Selection_Details').html("<div class='m-5 p-5 text-center align-middle text-secondary'><div class='spinner-border' role='status'></div><div class='p-3'>Processing, please wait.</div></div>");

      var DataCollectString="Modal-Selection.php?source="+source+"&lookup="+lookup;
      console.log("Data Call: "+DataCollectString);

      $(this).find('#Selection_Details').load(DataCollectString);
    });

    $("#Select").click(function(){
      
      var destination = $("#destination").val();
      var selectedoption = $('#SelectionList').find(":selected").val();
      
      $("#SelectionModal").modal('hide'); 

      window.location.href = "/"+destination+"/"+selectedoption;
      return false;

    });	
            
  });
</script>