<!doctype html>
<html lang="en">

<?php
$Suite = "Apex";
$Module = "Dashboard";

$HeaderTitle = "Dashboard";
?>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Head.inc";
include($path);
?>

<body>

<div class="d-flex" id="wrapper">
  <?php
  $path = $_SERVER['DOCUMENT_ROOT'];
  $path .= "/inc/Sidebar.inc";
  include($path);
  ?>
  

  <!-- Page Content -->
  <div id="page-content-wrapper">
    <?php include('inc/TopRightNavigation.inc'); ?>
    <div class="container-fluid bg-base-light">
      <h2 class="pl-3 pt-3 m-0"><?= $Parameter_AppTitle?></h2>
      
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax").click(function() {
                $("#dataload").load("Test.txt");
              });
            });
        </script>

        <div id="dataload">Wait for it.</div>

        <button id="testajax" class="btn btn-primary">Navigation</button>


        </div>
      </div>

      
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax2").click(function() {
                $("#dataload2").load("Test.txt");
              });
            });
        </script>

        <div id="dataload2">Wait for it.</div>

        <button id="testajax2" class="btn btn-secondary">Action</button>


        </div>
      </div>

      
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax3").click(function() {
                $("#dataload3").load("Test.txt");
              });
            });
        </script>

        <div id="dataload3">Wait for it.</div>

        <button id="testajax3" class="btn btn-success">outcome</button>


        </div>
      </div>

            
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax4").click(function() {
                $("#dataload4").load("Test.txt");
              });
            });
        </script>

        <div id="dataload4">Wait for it.</div>

        <button id="testajax4" class="btn btn-info">Information</button>


        </div>
      </div>

      
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax5").click(function() {
                $("#dataload5").load("Test.txt");
              });
            });
        </script>

        <div id="dataload5">Wait for it.</div>

        <button id="testajax5" class="btn btn-warning">Warning</button>


        </div>
      </div>


      
      <div class="row pl-3">
        <div id="col">

          <script>
            $(document).ready(function() {
              $("#testajax6").click(function() {
                $("#dataload6").load("Test.txt");
              });
            });
        </script>

        <div id="dataload6">Wait for it.</div>

        <button id="testajax6" class="btn btn-danger">Alert</button>


        </div>
      </div>

    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->


<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/Footer.inc";
include($path);
?>


</body>