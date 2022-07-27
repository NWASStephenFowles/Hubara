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

<meta http-equiv="Pragma" content="no-cache" />

<!-- Fetching Google Fonts -->
<link href='https://fonts.googleapis.com/css?family=Lemon|Montserrat:400,700|Capriola|Viga' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Overlock&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

<Title><?=$Parameter_SnippetTitle ?></Title>
<link rel="SHORTCUT ICON" href="<?=$Parameter_URL ?>Img/Icon.ico?v=<?=$Application_Version ?>"/>

<!-- Loading viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?=$Parameter_URL ?>css/bootstrap/5.1.3/css/bootstrap.css?v=<?=$Shared_Version ?>"/>


<!-- Modules (jquery) -->
<script type="text/javascript" src="<?=$Parameter_URL ?>inc/Shared/Components/jquery/3.6.0/jquery.min.js?v=<?=$Shared_Version ?>"></script>

<!-- Modules (fontawesome) -->
<script defer src="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/js/all.js?v=<?=$Shared_Version ?>" ></script>
<script defer src="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/js/v4-shims.js?v=<?=$Shared_Version ?>"></script>
<link rel="stylesheet" href="<?=$Parameter_URL ?>/inc/Shared/Components/fontawesome/6.1.1/css/all.css?v=<?=$Shared_Version ?>">


<!-- Loading Style sheets-->
<link href="<?=$Parameter_URL ?>inc/Shared/css/Palette.css?v=<?=$Shared_Version ?>" rel="stylesheet" type="text/css">

</head>