<?php require_once('../Connections/sitc.php'); ?>
<?php require_once('couper_caraactere.php'); ?>
<?php
mysql_query("SET NAMES UTF8");
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<?php
// Load the tNG classes
require_once('../includes/tng/tNG.inc.php');

// Make unified connection variable
$conn_sitc = new KT_connection($sitc, $database_sitc);

//Start Restrict Access To Page
$restrict = new tNG_RestrictAccess($conn_sitc, "../");
//Grand Levels: Level
$restrict->addLevel("1");
$restrict->addLevel("2");
$restrict->Execute();
//End Restrict Access To Page

// Require the MXI classes
require_once ('../includes/mxi/MXI.php');

// Include Multiple Static Pages
$mxiObj = new MXI_Includes("page");
$mxiObj->IncludeStatic("accueil", "accueil/accueil.php", "accueil", "", "");
$mxiObj->IncludeStatic("addInAccueil", "accueil/add_accueil.php", "ajouterAccueil", "", "");
$mxiObj->IncludeStatic("supprimeraccueil", "accueil/supprimeraccueil.php", "supprimerAccueil", "", "");
$mxiObj->IncludeStatic("modifieraccueil", "accueil/modifieraccueil.php", "modifierAccueil", "", "");
$mxiObj->IncludeStatic("detailsaccueil", "accueil/detailsaccueil.php", "detailsAccueil", "", "");
$mxiObj->IncludeStatic("publieraccueil", "accueil/publieraccueil.php", "publieraccueil", "", "");
$mxiObj->IncludeStatic("depublieraccueil", "accueil/depublieraccueil.php", "depublieraccueil", "", "");
$mxiObj->IncludeStatic("corbeilleaccueil", "accueil/corbeilleaccueil.php", "corbeilleaccueil", "", "");
$mxiObj->IncludeStatic("recupereraccueil", "accueil/recupereraccueil.php", "recupereraccueil", "", "");
$mxiObj->IncludeStatic("apropos", "apropos/apropos.php", "pageapropos", "", "");
$mxiObj->IncludeStatic("addapropos", "apropos/addapropos.php", "ajouterapropos", "", "");
$mxiObj->IncludeStatic("modifierapropos", "apropos/modifierapropos.php", "modifierapropos", "", "");
$mxiObj->IncludeStatic("supprimerapropos", "apropos/supprimerapropos.php", "supprimerapropos", "", "");
$mxiObj->IncludeStatic("publierapropos", "apropos/publierapropos.php", "publierapropos", "", "");
$mxiObj->IncludeStatic("depublierapropos", "apropos/depublierapropos.php", "depublierapropos", "", "");
$mxiObj->IncludeStatic("detailsapropos", "apropos/detailsapropos.php", "detailsapropos", "", "");
$mxiObj->IncludeStatic("corbeilleapropos", "apropos/corbeilleapropos.php", "corbeilleapropos", "", "");
$mxiObj->IncludeStatic("recupererapropos", "apropos/recupererapropos.php", "recupererapropos", "", "");
$mxiObj->IncludeStatic("fonctionnalites", "fonctionnalite/fonctionnalites.php", "pagedesfonctionnalites", "", "");
$mxiObj->IncludeStatic("addfonctionnalite", "fonctionnalite/addfonctionnalite.php", "ajouterfonctionnalite", "", "");
$mxiObj->IncludeStatic("modifierfonctionnalite", "fonctionnalite/modifierfonctionnalite.php", "modifierfonctionnalite", "", "");
$mxiObj->IncludeStatic("supprimerfonctionnalite", "fonctionnalite/supprimerfonctionnalite.php", "supprimerfonctionnalite", "", "");
$mxiObj->IncludeStatic("detailsfonctionnalite", "fonctionnalite/detailsfonctionnalite.php", "detailsfonctionnalite", "", "");
$mxiObj->IncludeStatic("publierfonctionnalite", "fonctionnalite/publierfonctionnalite.php", "publierfonctionnalite", "", "");
$mxiObj->IncludeStatic("depublierfonctionnalite", "fonctionnalite/depublierfonctionnalite.php", "depublierfonctionnalite", "", "");
$mxiObj->IncludeStatic("corbeillefonctionnalite", "fonctionnalite/corbeillefonctionnalite.php", "corbeillefonctionnalite", "", "");
$mxiObj->IncludeStatic("recupererfonctionnalite", "fonctionnalite/recupererfonctionnalite.php", "recupererfonctionnalite", "", "");
$mxiObj->IncludeStatic("materiel", "materiel/materiel.php", "pagemateriel", "", "");
$mxiObj->IncludeStatic("modifiermateriel", "materiel/modifiermateriel.php", "modifiermateriel", "", "");
$mxiObj->IncludeStatic("detailsmateriel", "materiel/detailsmateriel.php", "detailsmateriel", "", "");
$mxiObj->IncludeStatic("publiermateriel", "materiel/publiermateriel.php", "publiermateriel", "", "");
$mxiObj->IncludeStatic("depubliermateriel", "materiel/depubliermateriel.php", "depubliermateriel", "", "");
$mxiObj->IncludeStatic("supprimermateriel", "materiel/supprimermateriel.php", "supprimermateriel", "", "");
$mxiObj->IncludeStatic("corbeillemateriel", "materiel/corbeillemateriel.php", "corbeillemateriel", "", "");
$mxiObj->IncludeStatic("recuperermateriel", "materiel/recuperermateriel.php", "recuperermateriel", "", "");
$mxiObj->IncludeStatic("listeprojet", "projets/listeprojetparrubrique.php", "pagelisteprojetparrubrique", "", "");
$mxiObj->IncludeStatic("detailprojet", "projets/detail.php", "pagedetailprojet", "", "");
$mxiObj->IncludeStatic("rubriqueprojet", "projets/rubriqueprojet.php", "pageprojet", "", "");
$mxiObj->IncludeStatic("detailsprojet", "projets/detailsprojet.php", "pagedetailsprojet", "", "");
$mxiObj->IncludeStatic("addrubriqueprojet", "projets/addrubriqueprojet.php", "ajouterrubriqueprojet", "", "");
$mxiObj->IncludeStatic("publierrubrique", "projets/publierrubrique.php", "publierrubrique", "", "");
$mxiObj->IncludeStatic("depublierrubrique", "projets/depublierrubrique.php", "depublierrubrique", "", "");
$mxiObj->IncludeStatic("publierprojet", "projets/publierprojet.php", "publierprojet", "", "");
$mxiObj->IncludeStatic("depublierprojet", "projets/depublierprojet.php", "depublierprojet", "", "");
$mxiObj->IncludeStatic("addprojet", "projets/addprojet.php", "ajouterprojet", "", "");
$mxiObj->IncludeStatic("modifierrubriqueprojet", "projets/modifierrubriqueprojet.php", "modifierrubrique", "", "");
$mxiObj->IncludeStatic("detailrubrique", "projets/detailrubrique.php", "detailrubrique", "", "");
$mxiObj->IncludeStatic("modifierprojet", "projets/modifierprojet.php", "modifierprojet", "", "");
$mxiObj->IncludeStatic("supprimerrubriqueprojet", "projets/supprimerrubriqueprojet.php", "supprimerrubriqueprojet", "", "");
$mxiObj->IncludeStatic("supprimerprojet", "projets/supprimerprojet.php", "supprimerprojet", "", "");
$mxiObj->IncludeStatic("corbeilleprojet", "projets/corbeilleprojet.php", "pagecorbeilleprojet", "", "");
$mxiObj->IncludeStatic("recupererprojet", "projets/recupererprojet.php", "recupererprojet", "", "");
$mxiObj->IncludeStatic("corbeillerubrique", "projets/corbeillerubrique.php", "corbeillerubrique", "", "");
$mxiObj->IncludeStatic("recupererrubrique", "projets/recupererrubrique.php", "recupererrubrique", "", "");
$mxiObj->IncludeStatic("contact", "contact/contacts.php", "pagecontact", "", "");
$mxiObj->IncludeStatic("modifiercontact", "contact/modifiercontact.php", "modifiercontact", "", "");
$mxiObj->IncludeStatic("detailscontact", "contact/detailscontact.php", "detailscontact", "", "");
$mxiObj->IncludeStatic("publiercontact", "contact/publiercontact.php", "publiercontact", "", "");
$mxiObj->IncludeStatic("depubliercontact", "contact/depubliercontact.php", "depubliercontact", "", "");
$mxiObj->IncludeStatic("corbeillecontact", "contact/corbeillecontact.php", "corbeillecontact", "", "");
$mxiObj->IncludeStatic("recuperercontact", "contact/recuperercontact.php", "recuperercontact", "", "");
$mxiObj->IncludeStatic("supprimercontact", "contact/supprimercontact.php", "supprimercontact", "", "");
$mxiObj->IncludeStatic("partenaire", "partenaire/partenaire.php", "pagepartenaire", "", "");
$mxiObj->IncludeStatic("addpartenaire", "partenaire/addpartenaire.php", "ajouterpartenaire", "", "");
$mxiObj->IncludeStatic("modifierpartenaire", "partenaire/modifierpartenaire.php", "modifierpartenaire", "", "");
$mxiObj->IncludeStatic("supprimerpartenaire", "partenaire/supprimerpartenaire.php", "supprimerpartenaire", "", "");
$mxiObj->IncludeStatic("detailspartenaire", "partenaire/detailspartenaire.php", "detailspartenaire", "", "");
$mxiObj->IncludeStatic("publierpartenaire", "partenaire/publierpartenaire.php", "publierpartenaire", "", "");
$mxiObj->IncludeStatic("depublierpartenaire", "partenaire/depublierpartenaire.php", "depublierpartenaire", "", "");
$mxiObj->IncludeStatic("corbeillepartenaire", "partenaire/corbeillepartenaire.php", "corbeillepartenaire", "", "");
$mxiObj->IncludeStatic("recupererpartenaire", "partenaire/recupererpartenaire.php", "recupererpartenaire", "", "");
$mxiObj->IncludeStatic("dashboard", "tableau_de_bord.php", "pagedetableaudebord", "", "");

//code optimisé

//RUBRIQUES
$mxiObj->IncludeStatic("liste-rubrique", "rubrique/liste-rubrique.php", "liste-rubrique", "", "");
$mxiObj->IncludeStatic("editer-rubrique", "rubrique/editer-rubrique.php", "editer-rubrique", "", "");
$mxiObj->IncludeStatic("detail-rubrique", "rubrique/detail-rubrique.php", "detail-rubrique", "", "");
$mxiObj->IncludeStatic("supprimer-rubrique", "rubrique/supprimer-rubrique.php", "supprimer-rubrique", "", "");
$mxiObj->IncludeStatic("corbeille-rubrique", "rubrique/corbeille-rubrique.php", "corbeille-rubrique", "", "");
$mxiObj->IncludeStatic("restaurer-rubrique", "rubrique/restaurer-rubrique.php", "restaurer-rubrique", "", "");

//ARTICLES
$mxiObj->IncludeStatic("liste-article", "article/liste-article.php", "liste-article", "", "");
$mxiObj->IncludeStatic("editer-article", "article/editer-article.php", "editer-article", "", "");
$mxiObj->IncludeStatic("detail-article", "article/detail-article.php", "detail-article", "", "");
$mxiObj->IncludeStatic("corbeille-article", "article/corbeille-article.php", "corbeille-article", "", "");
$mxiObj->IncludeStatic("restaurer-article", "article/restaurer-article.php", "restaurer-article", "", "");

//UTILISATEURS
$mxiObj->IncludeStatic("supprimer-article", "article/supprimer-article.php", "supprimer-article", "", "");
$mxiObj->IncludeStatic("detail-utilisateur", "utilisateurs/detail-utilisateur.php", "detail-utilisateur", "", "");
// End Include Multiple Static Pages
?><!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"
        type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>
<meta charset="utf-8" />
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<title>ConsoleDatacollector</title>
<meta content="<?php echo $mxiObj->getDescription(); ?>" name="description" />
<meta content="<?php echo $mxiObj->getKeywords(); ?>" name="keywords" />
<!-- Favicons -->
<link href="assets/img/DCO1-4_logo.png" rel="icon" />
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
<!-- Google Fonts -->
<link href="https://fonts.gstatic.com" rel="preconnect" />
<link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet" />
<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js" defer></script>

<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
<!-- Vendor CSS Files -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
<link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
<link href="assets/vendor/quill/quill.snow.css" rel="stylesheet" />
<link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet" />
<link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
<link href="assets/vendor/simple-datatables/style.css" rel="stylesheet" />
<!-- Template Main CSS File -->
<!-- Styliser texte area -->
<link href="assets/css/style.css" rel="stylesheet" /><link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js" defer></script>

<!--pop-up-->
<script src="https://https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.min.css"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.33/dist/sweetalert2.all.min.js"></script>
 <!-- styliser texte area -->

<!-- =======================================================
  * Template Name: NiceAdmin - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<base href="<?php echo mxi_getBaseURL(); ?>" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="d-flex align-items-center justify-content-between">
            <a href="master.php?page=dashboard" class="logo d-flex align-items-center">
                <!-- <img src="assets/img/logo.png" alt="" /> -->
                <span class="d-none d-lg-block">Datacollector</span> <img src="assets/img/DCO1-4_logo.png" alt="" style="height:50px" />
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
            
        </div>
        <!-- End Logo -->
 <nav class="header-nav ms-auto">
<ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
<i class="bi bi-person"></i>
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $_SESSION['kt_login_user']; ?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6><?php echo $_SESSION['kt_nom_usr']; ?> <?php echo $_SESSION['kt_prenom_usr']; ?></h6>
              <?php /*?><span><?php echo $_SESSION['kt_poste']; ?></span><?php */?>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>
                <?php 
// Show IF Conditional region2 
if (@$_SESSION['kt_login_level'] == 1) {
?>
                Administrateur
                  <?php 
// else Conditional region2
} else { ?>
                  Modérateur
  <?php } 
// endif Conditional region2
?></span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
           
              <a class="dropdown-item d-flex align-items-center" href="<?php echo $logoutAction ?>" class="btn btn-primary">
                <i class="bi bi-box-arrow-right"></i>
                <span>Deconnexion</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav>


        
      <!-- End Icons Navigation -->
    </header>
    <!-- End Header -->
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    <aside id="sidebar" class="sidebar">
        <ul class="sidebar-nav" id="sidebar-nav">
            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=dashboard">
                    <i class="bi bi-grid"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <!-- End Dashboard Nav -->

            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=1">
                   <!-- <i class="bi bi-person"></i>-->
                    <span>Accueil</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=2">
                   <!-- <i class="bi bi-person"></i>-->
                    <span>A propos de nous</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=3">
                    <!-- <i class="bi bi-person"></i>-->
                    <span>Nos services</span>
                </a>
            </li>
            <!-- End Profile Page Nav -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=4">
                    <!-- <i class="bi bi-person"></i>-->
                    <span>Nos réalisations</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=10">
                    <!-- <i class="bi bi-person"></i>-->
                    <span>Nous contacter</span>
                </a>
            </li> 
            <!-- End Profile Page Nav -->
            <?php
//Show If User Is Logged In (region1)
$isLoggedIn = new tNG_UserLoggedIn($conn_sitc);
//Grand Levels: Level
$isLoggedIn->addLevel("1");
if ($isLoggedIn->Execute()) {
?>
              <!--<li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-rubrique&idrub_rub=5">
                  <span>Projets</span>                
                </a>                  
              </li>-->
              <?php
}
//End Show If User Is Logged In (region1)
?><!--<li class="nav-item">
                <a class="nav-link collapsed" href="master.php?page=liste-article&idrub_art=11">
                    <span>Partenaires</span>
                </a>
            </li>-->
            <!-- End Profile Page Nav -->
        </ul>
    </aside>
    <!-- End Sidebar-->
    <main id="main" class="main">
      <?php
	  $incFileName = $mxiObj->getCurrentInclude();
	  if ($incFileName !== null)  {
		mxi_includes_start($incFileName);
		require(basename($incFileName)); // require the page content
		mxi_includes_end();
		}
		?>
</main>
    <!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>Datacollector</span></strong>. Tout droit réservé
        </div>
        <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
        </div>
    </footer>
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js" defer></script>
    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/chart.js/chart.min.js"></script>
    <script src="assets/vendor/echarts/echarts.min.js"></script>
    <script src="assets/vendor/quill/quill.min.js"></script>
    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <!-- styliser texte area -->
    <script type="text/javascript">
$(document).ready(function() {
      $('#summernote1').summernote({
        disableDragAndDrop: true,
        lang: 'fr-FR',
        placeholder: 'Saisissez le texte ici',
        tabsize: 2,
        height: 140,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          // ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen']]
        ]
      }); });
    </script>
     
      <script type="text/javascript">
$(document).ready(function() {
      $('#summernote2').summernote({
        disableDragAndDrop: true,
        lang: 'fr-FR',
        placeholder: 'Saisissez le texte ici',
        tabsize: 2,
        height: 140,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          // ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen']]
        ]
      }); });
    </script>
    
    <script type="text/javascript">
$(document).ready(function() {
      $('#summernote3').summernote({
        disableDragAndDrop: true,
        lang: 'fr-FR',
        placeholder: 'Saisissez le texte ici',
        tabsize: 2,
        height: 140,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          // ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          // ['table', ['table']],
          // ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen']]
        ]
      }); });
    </script>
     
    <script>
    $(document).ready(function() {
      $(document).ready(function() {
    $('#example').DataTable({
    "language": {
    "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
    "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
    "sInfoFiltered":   "(filtr&eacute; &agrave; partir de _MAX_ &eacute;l&eacute;ments au total)",
    "sInfoPostFix":    "",
    "sInfoThousands":  ",",
    "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
    "sLoadingRecords": "Chargement...",
    "sProcessing":     "Traitement...",
    "sSearch":         "Rechercher :",
    "sZeroRecords":    "Aucun &eacute;l&eacute;ment correspondant trouv&eacute;",
    "oPaginate": {
        "sFirst":    "Premier",
        "sLast":     "Dernier",
        "sNext":     "Suivant",
        "sPrevious": "Pr&eacute;c&eacute;dent"
    },
    "oAria": {
        "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
        "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
    },
    "select": {
            "rows": {
                "_": "%d lignes s&eacute;lectionn&eacute;es",
                "0": "Aucune ligne s&eacute;lectionn&eacute;e",
                "1": "1 ligne s&eacute;lectionn&eacute;e"
            } 
    }
}
  });
} );
} );
  </script>
  
</body>
</html>