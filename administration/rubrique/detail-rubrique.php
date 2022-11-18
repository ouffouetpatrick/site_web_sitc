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
if (isset($_GET['id_rub'])) {
  $colname_detail = $_GET['id_rub'];
}
mysql_select_db($database_sitc, $sitc);
$query_detail = sprintf("SELECT * FROM rubrique WHERE id_rub = %s", GetSQLValueString($colname_detail, "int"));
$detail = mysql_query($query_detail, $sitc) or die(mysql_error());
$row_detail = mysql_fetch_assoc($detail);
$totalRows_detail = mysql_num_rows($detail);


?><section class="section">
            <div class="row  text-center">
                <div class="col-lg-12 card">
              
                  <div class="jumbotron">
  <h5>Libelle:
    <?php 
// Show IF Conditional region1 
if (@$row_detail['libelle_rub'] != "") {
?>
      <?php echo $row_detail['libelle_rub']; ?>
      <?php 
// else Conditional region1
} else { ?>
      Aucun objet
  <?php } 
// endif Conditional region1
?></h5></br>
<h5>Description:
  <?php 
// Show IF Conditional region2 
if (@$row_detail['description_rub'] != "") {
?>
    <?php echo $row_detail['description_rub']; ?>
    <?php 
// else Conditional region2
} else { ?>
    Aucun titre
  <?php } 
// endif Conditional region2
?></h5></br>
  
  <?php 
// Show If File Exists (region4)
if (tNG_fileExists("../../assets/image/", "{detail.image_rub}")) {
?>
    <img src="<?php echo tNG_showDynamicImage("../../", "../../assets/image/", "{detail.image_rub}");?>" alt="" style="height: 200px "/>
    <?php 
// else File Exists (region4)
} else { ?>
    Aucune image
  <?php } 
// EndIf File Exists (region4)
?>

    </div>
      </div>
        </div>
                     <div class="col-sm-12">
                              <a href="../master.php?page=liste-rubrique&amp;idrub_rub=5" class="btn btn-primary"  style="
    background: #041a42; !important"> Retour</a>                                </div>
                   
</section>


<?php
mysql_free_result($detail);
?>
