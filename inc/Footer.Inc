


<div class="row top-border footer fixed-bottom border-dark bg-footer dash-text-secondary  <?= $CompactView ?>">
	<div class="col-md-6 text-center text-sm-left">
    <?php
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/inc/About.inc";
    include($path);
    ?>
      <div class="image text-center text-sm-left mt-1 ml-2">
            <a class="dash-text-secondary display-3 text-weight-50 link-light" data-bs-toggle="modal" data-bs-target="#ReleaseInformation" href="#" Title="About <?= $Parameter_AppTitle ?>" target="_blank">
                <img class="img-fluid pl-1" src="<?= $Parameter_URL ?>img/Corp_Logo-White.png?v=<?= $Application_Version ?>"
                    style="max-width: 50px;"
                    alt="<?= $Parameter_AppTitle ?>" />
                    <?= $Parameter_AppTitle ?>
            </a>
      </div>
	</div>
	<div class="col-md-6 text-center text-sm-right">
		<h6 class="pt-2 pb-2"><a class="dash-text-secondary display-4 text-weight-50" href="https://nwas.nhs.uk/" Title="<?= $Parameter_Corp ?>" target="_blank"><?= $Parameter_Copyright ?></a></h6>
	</div>
</Div>


<!-- Menu Toggle Script -->
<script>

  $(window).ready(function() {
    
    $("#ReleaseInformation").on("show.bs.modal", function(btn){
      
      $('#ReleaseInformation').appendTo("body") 

    });
    

          
  });
  
  
</script>

<!-- Bootstrap core JavaScript -->
<script src="<?= $Parameter_URL ?>Inc/Shared/Components/bootstrap/5.1.3/js/bootstrap.min.js" ></script>

