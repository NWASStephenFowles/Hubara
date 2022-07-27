<!doctype html>
<html lang="en">


<?php
$path = "Section.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Head.inc";
include($path);
?>

<body class="bg-base-primary">

<div class="" id="wrapper">
  

  <!-- Page Content -->
  <div id="page-content-wrapper" class="">
    <?php 
      $path = $_SERVER['DOCUMENT_ROOT'];
      $path .= "/inc/Header.inc";
      include($path);
    ?>
    <div class="container-fluid bg-base-primary">
      <h1 class="pl-3 pt-3 pb-3 m-0">Snippets</h1>

      <div class="row">
        <div class="col">

        <div id="table-container">

          <table id='DataSet' class='bg-dark table table-striped table-bordered table-hover border border-primary sticky-header'>
            <thead class='thead-dark'>
                <?php
                                  
                  foreach($fetch_SQLFieldNames as $key=>$SQLFieldName){ 

                    switch($SQLFieldName['Name']) {
                      case "ID";
                        break;
                      default:
                        If ($SQLFieldName['Level'] == "1") {
                          echo "<th class='text-center'>".$SQLFieldName['AS']."</th>";
                        }
                        break;
                      }
                  }
                ?>
                <th>Actions</th>
                <th>Details</th>
            </thead>
          </table>
          </div>

        </div>
      </div>


       
        <!-- Modal -->
        <div class="modal fade" id="DetailsModal" role="dialog" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h2 class="modal-title text-dark" id="modalTitle">Details</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>

        
        
        <script>

          // Startup options
          $(document).ready(function() {
            $('#DataSet').DataTable();
            //$("#wrapper").toggleClass("toggled");


            $("#DetailsModal").on("show.bs.modal", function(btn){
              var triggerLink = $(btn.relatedTarget);
              var lineid = triggerLink.data("id");
              var linetitle = triggerLink.data("title");

              // Place the returned HTML into the selected element
              $(this).find(".modal-body").html("Processing, please wait.");
              $(this).find(".modal-title").html(linetitle);
              $(this).find(".modal-body").load("Modal-data.php?ID="+lineid);
            });

  
          });
          
          

          // Startup options
          $(document).ready(function() {
            
            $('#DataSet').DataTable().destroy();

            fetch_data(0)
            function fetch_data()
              {
                var dataTable = $('#DataSet').DataTable({
                    "columnDefs": [
                      { "width": "20px", "targets": -1, "orderable": false},
                      { "width": "50px", "targets": -2, "orderable": false},
                      {"className": "text-center align-middle", "targets": "_all"}
                ],
                "ordering": false,
                "info":     false,
                "searching": false,
                "processing": true,
                "serverSide": false,
                "responsive": true,
                "fixedHeader": true,
                "scrollY": '50vh',
                "scrollCollapse": true,
                "paging": false,
                "pageLength": 20,
                "ajax" : {
                url:"Collect-Data.php",
                type:"POST",
                error:function(){
                                      
                  $("#ErrorTitle").html("Oops");
                  $("#ErrorDetails").html("Unable to retrieve data, please try again.");

                  $('#ErrorMessage').modal('show');


                }  
                }
              });

            };
          
          
          
          });

        </script>


    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


<!-- New Message Modal -->
<div class="modal fade bg-gray-transparent" id="NewModal" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header bg-primary text-white">
        <h2 class="modal-title" id="NewTitle">New Message</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="MessageDetails" class="modal-body">

      <form method="post" action="Action-Add.php" id="AddMessage" name="AddMessage" >
            
        <div class="mb-1">
          <label for="Group" class="col-form-label">Group:</label>
          <select id='Group' name='Group' class='form-control'>";
            <option selected value='0'>Select</option>
              <?php
                $FetchedSelectArray = fetch_DataClusters("Dropdown", "Shortcut Groups", "0");

                foreach($FetchedSelectArray as $FetchedSelectItem){ 
                  echo "<option value='".$FetchedSelectItem['Value']."'>".$FetchedSelectItem['Data 1']."</option>";
                }
              ?>
            </select>
        </div>

        <div class="mb-1">
          <label for="ExpireDate" class="col-form-label">Expire Date:</label>
          <input required type="date" class="form-control" id="ExpireDate" name="ExpireDate" value="">
        </div>


        
        <div class="mb-1">
          <label for="Type" class="col-form-label">Message Type:</label>
          <select id='Type' name='Type' class='form-control'>";
            <option selected value='0'>Select</option>
              <?php
                $FetchedSelectArray = fetch_DataClusters("Dropdown", "Message Type", "0");

                foreach($FetchedSelectArray as $FetchedSelectItem){ 
                  echo "<option value='".$FetchedSelectItem['ID']."'>".$FetchedSelectItem['Data 1']."</option>";
                }
              ?>
            </select>
        </div>


        <div class="mb-1">
          <label for="Title" class="col-form-label">Title:</label>
          <input required type="text" class="form-control" id="Title" name="Title" value="">
        </div>

        <div class="mb-1">
          <label for="Message" class="col-form-label">Message:</label>
          <textarea id="Message" name="Message" class="form-control" rows="5" cols="50"></textarea>
        </div>

      <div class="mb-1">
        <label for="URL" class="col-form-label">URL:</label>
        <input type="text" class="form-control" id="URL" name="URL" value="">
      </div>

        
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id='AddNewItem' class="btn btn-primary">Add</button>
        </div>
      
      </form>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    $("#NewModal").on("show.bs.modal", function(){

      $("#AddMessage").on('submit',(function(e) {
        e.preventDefault();
        $.ajax({
          type: "POST",
          url: "Action-Add.php",
          data: $("#AddMessage").serialize(),
          beforeSend : function()
          {
          },
          success: function(response)
          {
            console.log("success");
            console.log(response);
            $('#NewModal').modal('hide');
            $('#AddMessage').unbind();
            $('#DataSet').DataTable().ajax.reload(null, false);

          },
          error: function(response) 
            {
              console.log("error");
              console.log(response);

              $("#ErrorTitle").html("Oops");
              $("#ErrorDetails").html("("+response.status+") Unable to perform function.");

              $('#ErrorMessage').modal('show');
            }          
          });
      }));
        

    });

  });
</script>

<!-- Error Message Modal -->
<div class="modal fade bg-gray-transparent" id="ErrorMessage" role="dialog" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content ">
      <div class="modal-header bg-warning test-white">
        <h2 class="modal-title" id="ErrorTitle">Details</h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div id="ErrorDetails" class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function copyURL() {
    /* Get the text field */
    var copyText = document.getElementById("myInput");

    /* Select the text field */
    copyText.select();
    copyText.setSelectionRange(0, 99999); /* For mobile devices */

    /* Copy the text inside the text field */
    navigator.clipboard.writeText(copyText.value);

    /* Alert the copied text */
    alert("Copied the text: " + copyText.value);
  }
</script>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Footer.inc";
include($path);
?>


</body>