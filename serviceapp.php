<?php require_once('Connections/sitc.php'); ?>
<?php
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

$colname_rs_detail_service = "-1";
if (isset($_GET['id_art'])) {
  $colname_rs_detail_service = $_GET['id_art'];
}
mysql_select_db($database_sitc, $sitc);
$query_rs_detail_service = sprintf("SELECT * FROM article WHERE id_art = %s", GetSQLValueString($colname_rs_detail_service, "int"));
$rs_detail_service = mysql_query($query_rs_detail_service, $sitc) or die(mysql_error());
$row_rs_detail_service = mysql_fetch_assoc($rs_detail_service);
$totalRows_rs_detail_service = mysql_num_rows($rs_detail_service);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="indication-page col-md-12">
                <div class="accueil"> <a href="index.php">accueil</a> </div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">Nos services</div>
            </div>
        </div>
    </div>
    <!------------ SERVICE APP ---------->
    <div class="container serviceapp">
        <div class="row">
            <div class="col-md-7">
               <?php echo $row_rs_detail_service['description_art']; ?>
            </div>
            <div class="col-md-5 image-serviceapp">
                <img src="res/<?php echo $row_rs_detail_service['image1_art']; ?>" alt="">
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <?php echo $row_rs_detail_service['contenu3_art']; ?>
            </div>
        </div>
    </div>
    <!--------------- FOOTER --------------------->
    <?php
mysql_free_result($rs_detail_service);
?>
    