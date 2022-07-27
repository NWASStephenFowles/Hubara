
<?php

$CompactView = "";
$SetCompactView = "";
if(isset($_GET['CompactView'])){  
  If ($_GET['CompactView'] == "Y") {
    $CompactView = "";
    $SetCompactView = "Y";
  }
} else {
  $CompactView = "";
  $SetCompactView = "N";
}

?>

<div class="row bg-header border-bottom align-items-center <?= $CompactView ?>">


  <div class="col-2 pl-4">
    <a href="<?= $Parameter_URL ?>">
      <img class="img-fluid float-left p-1" style="height:50px;" src="<?= $Parameter_URL ?>img/Logo_Dark.png?v=<?= $Application_Version ?>" alt="<?= $Parameter_AppName ?>">
    </a>
  </div>

  <div class="col-8 ">
    <h1 id="HeaderTitle" class="text-center align-middle m-0"></h1>
  </div>

  <div class="col-2 ">
    <a href="<?= $Parameter_URL ?>">
        <img class="img-fluid  float-right p-1" style="height:40px;" src="<?= $Parameter_URL ?>img/AppLogo.png?v=<?= $Application_Version ?>" alt="<?= $Parameter_AppName ?>">
    </a>
  </div>

</div>

