
<div class="modal fade" id="ReleaseInformation" tabindex="-1" aria-labelledby="ReleaseInformationLabel" aria-hidden="true" data-backdrop="false" >
  <div class="modal-dialog">
    <div class="modal-content bg-base-dark">
      <div class="modal-header">
        <h2 class="modal-title" id="ReleaseInformationLabel"><img width="30px" src="<?= $Parameter_URL ?>img/icon.png"> <?= $Parameter_AppTitle ?></h2>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="text-center">Application: <strong><?= $Parameter_AppTitle ?></strong></p>
        <p class="text-center">Channel: <strong><?= $Parameter_Channel ?></strong></p>
        <p class="text-center">Version: <strong><?= $Application_Version ?></strong> / Release Date: <strong><?= $Application_Date ?></strong></p>

        <p class="text-center"><?= $Parameter_AppTitle ?> is a service delivered by</p>
        <p class="text-center"><img src="<?= $Parameter_URL ?>img/Logo_Dark.png?v=<?= $Application_Version ?>"
                class="img-fluid"
                style="max-width: 100px;"
                alt="<?= $Parameter_AppName ?>" /></p>

        <p class="text-center"><a href="<?= $Parameter_URL ?>Contact Us/" class="text-center">Send Feedback Or Report An Issue</a></p>

        <p class="text-center">Written and developed by North West Ambulance Service</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


