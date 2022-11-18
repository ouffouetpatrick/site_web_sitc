<?php require_once('../../Connections/sitc.php'); ?>
<?php
// Load the tNG classes
require_once('../../includes/tng/tNG.inc.php');

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_detail = "-1";
if (isset($_GET['id_art'])) {
  $colname_detail = $_GET['id_art'];
}
mysql_select_db($database_sitc, $sitc);
$query_detail = sprintf("SELECT * FROM article WHERE id_art = %s", GetSQLValueString($colname_detail, "int"));
$detail = mysql_query($query_detail, $sitc) or die(mysql_error());
$row_detail = mysql_fetch_assoc($detail);
$totalRows_detail = mysql_num_rows($detail);

$colname_detail = "-1";
if (isset($_GET['id_art'])) {
  $colname_detail = $_GET['id_art'];
}
mysql_select_db($database_sitc, $sitc);
$query_detail = sprintf("SELECT * FROM article WHERE id_art = %s", GetSQLValueString($colname_detail, "int"));
$detail = mysql_query($query_detail,  $sitc) or die(mysql_error());
$row_detail = mysql_fetch_assoc($detail);
$totalRows_detail = mysql_num_rows($detail);
?>

<section class="section">
<div class="row  text-center">
<div class="col-lg-12 card">
<div class="jumbotron">

<h5>libelle:
<?php 
// Show IF Conditional region1 
if (@$row_detail['libelle_art'] != "") {
?>
      <?php echo $row_detail['libelle_art']; ?>
      <?php 
// else Conditional region1
} else { ?>
      Aucun objet
  <?php } 
// endif Conditional region1
?></h5></br>


  <?php 
// Show IF Conditional region23 
if (@$row_detail['idrub_art'] != 4) {
?>
    <h5>contenu1:
      <?php 
// Show IF Conditional region2 
if (@$row_detail['contenu1_art'] != "") {
?>
          <?php echo $row_detail['contenu1_art']; ?>
          <?php 
// else Conditional region2
} else { ?>
        Aucun titre
        <?php } 
// endif Conditional region2
?>
    </h5>
    <?php } 
// endif Conditional region23
?></br>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 1 || @$row_detail['idrub_art'] == 3 || @$row_detail['idrub_art'] == 4) {
?>

<h5>contenu2:
    <?php 
// Show IF Conditional region3 
if (@$row_detail['contenu2_art'] != "") {
?>
      <?php echo $row_detail['contenu2_art']; ?>
      <?php 
// else Conditional region3
} else { ?>
      Aucun contenu
  <?php } 
// endif Conditional region3
?></h5></br>

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 3 ) {
?>

<h5>contenu3:
    <?php 
// Show IF Conditional region3 
if (@$row_detail['contenu3_art'] != "") {
?>
      <?php echo $row_detail['contenu3_art']; ?>
      <?php 
// else Conditional region3
} else { ?>
      Aucun contenu
  <?php } 
// endif Conditional region3
?></h5></br>

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 1 ) {
?>

<h5>texte_art:
    <?php 
// Show IF Conditional region3 
if (@$row_detail['texte_art'] != "") {
?>
      <?php echo $row_detail['texte_art']; ?>
      <?php 
// else Conditional region3
} else { ?>
      Aucun contenu
  <?php } 
// endif Conditional region3
?></h5></br>

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] != 10) {
?>

<h5>description:
    <?php 
// Show IF Conditional region3 
if (@$row_detail['description_art'] != "") {
?>
      <?php echo $row_detail['description_art']; ?>
      <?php 
// else Conditional region3
} else { ?>
      Aucune description
  <?php } 
// endif Conditional region3
?></h5></br>

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] > 11 ) {
?>

<h5>texte_lien:
    <?php 
// Show IF Conditional region3 
if (@$row_detail['texte_lien_art'] != "") {
?>
      <?php echo $row_detail['texte_lien_art']; ?>
      <?php 
// else Conditional region3
} else { ?>
      Aucun contenu
  <?php } 
// endif Conditional region3
?></h5></br>

<?php } 
// endif Conditional region12
?>


<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] != 10) {
?>

<?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image1_art}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image1_art}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?><br/><br /><br />

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 3 || @$row_detail['idrub_art'] == 4) {
?>

<?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image2_art}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image2_art}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?><br/><br /><br />

<?php } 
// endif Conditional region12
?>



<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 4) {
?>

<?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image3_art}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image3_art}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?><br /><br /><br />

<?php } 
// endif Conditional region12
?>

<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 4) {
?>

<?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image4_art}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image4_art}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?><br/><br /><br />

<?php } 
// endif Conditional region12
?>

<?php 
// Show IF Conditional region12 
if (@$row_detail['idrub_art'] == 4) {
?>

<?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image5_art}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image5_art}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?><br/><br /><br />

<?php } 
// endif Conditional region12
?>


</div>
</div>
</div>
<div class="col-sm-12">

<a href="../master.php?page=liste-article&amp;idrub_art=<?php echo $row_detail['idrub_art']; ?>" class="btn btn-primary"  style="
    background: #041a42; !important"> Retour</a>
</div>                  
</section>

<?php
mysql_free_result($detail);
?>
