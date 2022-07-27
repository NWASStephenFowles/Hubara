<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/AppRelease.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/Parameters.inc";
include($path);
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/inc/functions.inc";
include($path);
?>

<head>


<link rel="manifest" href="/manifest.json">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="application-name" content="<?=$Parameter_AppTitle ?>">
<meta name="apple-mobile-web-app-title" content="<?=$Parameter_AppTitle ?>">
<meta name="theme-color" content="#181818">
<meta name="msapplication-navbutton-color" content="#E2E729">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="msapplication-starturl" content="/">

<link rel="icon" sizes="192x192" href="<?=$Parameter_URL ?>img/icon.ico?v=<?=$Application_Version ?>">
<link rel="apple-touch-icon" href="<?=$Parameter_URL ?>img/icons/ios-icon-192x192.png?v=<?=$Application_Version ?>">
<link rel="apple-touch-icon" sizes="152x152" href="<?=$Parameter_URL ?>img/icons/ios-icon-152x152.png?v=<?=$Application_Version ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?=$Parameter_URL ?>img/icons/ios-icon-180x180.png?v=<?=$Application_Version ?>">
<link rel="apple-touch-icon" sizes="167x167" href="<?=$Parameter_URL ?>img/icons/ios-icon-167x167.png?v=<?=$Application_Version ?>">

<script src='<?=$Parameter_URL ?>app.js'></script>



<?php
/* echo "Site Status: " . $Application_Status . "</br>"; */
If ($Application_Status=="Down") {
	$RedirectURL = $Parameter_URL . "Maintenance.php";
    header('Location: '.$RedirectURL);
}
?>

<?php
$sd_ImageSource = $Parameter_URL . $Parameter_AppLogo;
$sd_Image = str_replace($sd_ImageSource, " ", "+");
$sd_Start = str_replace($Parameter_AppTitle, "&", "and");
$sd_SafeURL = str_replace($Parameter_AppTitle, " ", "+");
?>


<meta http-equiv="Pragma" content="no-cache" />

<?php
If ($Parameter_Channel <> "Production") {
	$AppTitle = $Parameter_AppTitle . " (" . $Parameter_Description . ")";
} {
	$AppTitle = $Parameter_AppTitle;
}
?>

<Title><?=$AppTitle ?></Title>
<link rel="SHORTCUT ICON" href="<?=$Parameter_URL ?>Img/Icon.ico?v=<?=$Application_Version ?>"/>


<!-- Seeeting metadata -->
<META charset="utf-8">
<META http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="robot" CONTENT="index,follow">
<META NAME="copyright" CONTENT="<?=$Parameter_Copyright ?>. All Rights Reserved.">
<META NAME="author" CONTENT="<?=$Parameter_Author ?>">
<LINK REV="made" href="mailto:<?=$Parameter_Contact ?>">
<META NAME="language" CONTENT="English">
<LINK rel="Start" title="<%= sd_Start ?>" type="text/html"  href="<?=$Parameter_URL ?>">
<meta itemprop="name" content="<?=$Parameter_AppName ?>">
<meta itemprop="description" content="<?=$Parameter_Description ?>">
<meta itemprop="image" content="<%= $sd_Image ?>">
<link rel="canonical" href="<?=$Parameter_URL ?>" /> 


<!-- Loading viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=$Parameter_URL ?>css/bootstrap/5.1.3/css/bootstrap.css?v=<?=$Shared_Version ?>"/>


<!-- Modules (jquery) -->
<script type="text/javascript" src="<?=$Parameter_URL ?>inc/Shared/Components/jquery/3.6.0/jquery.min.js?v=<?=$Shared_Version ?>"></script>

<!-- daterangepicker -->
<link rel="stylesheet" href="<?=$Parameter_URL ?>inc/Shared/Components/daterangepicker/3.1/daterangepicker.css?v=<?= $Shared_Version ?>">
<script type="text/javascript" src="<?=$Parameter_URL ?>inc/Shared/Components/daterangepicker/3.1/moment.min.js?v=<?= $Shared_Version ?>"></script>
<script type="text/javascript" src="<?=$Parameter_URL ?>inc/Shared/Components/daterangepicker/3.1/daterangepicker.js?v=<?= $Shared_Version ?>"></script>

<!-- Modules (fontawesome) -->
<script defer src="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/js/all.js?v=<?=$Shared_Version ?>" ></script>
<script defer src="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/js/v4-shims.js?v=<?=$Shared_Version ?>"></script>
<link rel="stylesheet" href="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/css/all.css?v=<?=$Shared_Version ?>">


<!-- Modules (DataTables) -->
<link rel="stylesheet" type="text/css" href="<?=$Parameter_URL ?>/inc/Shared/Components/DataTables/1.12.1/datatables.css?v=<?=$Shared_Version ?>"/>
<script type="text/javascript" src="<?=$Parameter_URL ?>/inc/Shared/Components/DataTables/1.12.1/datatables.js?v=<?=$Shared_Version ?>"></script>


<!-- Loading Style sheets-->
<link href="<?=$Parameter_URL ?>inc/Shared/css/Palette.css?v=<?=$Shared_Version ?>" rel="stylesheet" type="text/css">
<link href="<?=$Parameter_URL ?>css/Colour-Scheme.css?v=<?=$Application_Version ?>" rel="stylesheet" type="text/css">
<link href="<?=$Parameter_URL ?>css/Core.css?v=<?=$Application_Version ?>" rel="stylesheet" type="text/css">
<link href="<?=$Parameter_URL ?>css/Layout.css?v=<?=$Application_Version ?>" rel="stylesheet" type="text/css">


</head>