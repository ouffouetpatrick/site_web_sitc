<?php
// Require the MXI classes
require_once ('includes/mxi/MXI.php');


// Include Multiple Static Pages
$mxiObj = new MXI_Includes("page");

//Page rubrique
$mxiObj->IncludeStatic("apropos", "apropos.php", "apropos", "", "");
$mxiObj->IncludeStatic("services", "services.php", "services", "", "");
$mxiObj->IncludeStatic("realisations", "realisations.php", "realisations", "", "");
$mxiObj->IncludeStatic("contacts", "contacts.php", "contacts", "", "");

//Sous page rubrique
$mxiObj->IncludeStatic("serviceapp", "serviceapp.php", "serviceapp", "", "");
$mxiObj->IncludeStatic("serviceqa", "serviceqa.php", "serviceqa", "", "");
$mxiObj->IncludeStatic("servicesig", "servicesig.php", "servicesig", "", "");
$mxiObj->IncludeStatic("sienea", "sienea.php", "sienea", "", "");
$mxiObj->IncludeStatic("ministere", "ministere.php", "ministere", "", "");
$mxiObj->IncludeStatic("dcweb", "dcweb.php", "dcweb", "", "");
$mxiObj->IncludeStatic("matox", "matox.php", "matox", "", "");
$mxiObj->IncludeStatic("ubercare", "ubercare.php", "ubercare", "", "");
$mxiObj->IncludeStatic("dcmobile", "dcmobile.php", "dcmobile", "", "");

// End Include Multiple Static Pages
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styles/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<title><?php echo $mxiObj->getTitle(); ?></title>
<link rel="stylesheet" href="styles/css/accueil.css">
<link rel="stylesheet" href="styles/css/navbar.css">
<link rel="stylesheet" href="styles/css/footer.css">
<link rel="stylesheet" href="styles/css/apropos.css">
<link rel="stylesheet" href="styles/css/services.css">
<link rel="stylesheet" href="styles/css/realisations.css">
<link rel="stylesheet" href="styles/css/contacts.css">
<link rel="stylesheet" href="styles/css/serviceapp.css">
<link rel="stylesheet" href="styles/css/serviceqa.css">
<link rel="stylesheet" href="styles/css/servicesig.css">
<link rel="stylesheet" href="styles/css/projet.css">
<meta name="keywords" content="<?php echo $mxiObj->getKeywords(); ?>" />
<meta name="description" content="<?php echo $mxiObj->getDescription(); ?>" />
<base href="<?php echo mxi_getBaseURL(); ?>" />
</head>
<body>
    <!---------------MENU NAVBAR----------------->
    <?php include("header.php") ?>
    
    
    <!--+++++++++++++++++++++ MAIN +++++++++++++++++++++-->
    <?php
		$incFileName = $mxiObj->getCurrentInclude();
		if ($incFileName !== null)  {
			mxi_includes_start($incFileName);
			require(basename($incFileName)); // require the page content
			mxi_includes_end();
		}
	?>
	<!--+++++++++++++++++++++ MAIN +++++++++++++++++++++-->
    
    <!--------------------- FOOTER ---------------->
    <?php include("footer.php")?>
    <script src="styles/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</html>