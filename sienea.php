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

$colname_rs_projet = "-1";
if (isset($_GET['id_art'])) {
  $colname_rs_projet = $_GET['id_art'];
}
mysql_select_db($database_sitc, $sitc);
$query_rs_projet = sprintf("SELECT * FROM article WHERE id_art = %s", GetSQLValueString($colname_rs_projet, "int"));
$rs_projet = mysql_query($query_rs_projet, $sitc) or die(mysql_error());
$row_rs_projet = mysql_fetch_assoc($rs_projet);
$totalRows_rs_projet = mysql_num_rows($rs_projet);
?>
    <!---------INDICATION PAGE---------->
    <div class="container-fluid">
        <div class="row">
            <div class="indication-page col-md-12">
                <div class="accueil"> <a href="index.php">accueil</a> </div>
                <span><i class="uil uil-angle-right"></i></span>
                <div class="page-actuel">Nos réalisations</div>
            </div>
        </div>
    </div>
    <div class="container header-projet">
        <div class="row">
            <div class="col-md-4 header-left">
                <?php echo $row_rs_projet['contenu2_art']; ?>
            </div>
            <div class="col-md-8 header-right">
                <img src="res/<?php echo $row_rs_projet['image1_art']; ?>" alt="">
            </div>
        </div>
    </div>
    <div class="container presentation-project">
   <?php echo $row_rs_projet['description_art']; ?>
    </div>
    <div class="container body-projet">
        <div class="row body1">
            <div class="col-md-6 body-left">
                <a href="res/projet1.PNG"><img src="res/<?php echo $row_rs_projet['image2_art']; ?>" alt=""></a>
            </div>
            <div class="col-md-6 body-right">
                <a href="res/projet-sitc3.min.jpg"><img src="res/<?php echo $row_rs_projet['image3_art']; ?>" alt=""></a>
            </div>
        </div>
        <div class="row body2">
            <div class="col-md-6 body-left2">
                <a href="res/projet-sitc4.min.jpg"><img src="res/<?php echo $row_rs_projet['image4_art']; ?>" alt=""></a>
            </div>
            <div class="col-md-6 body-right2">
                <a href="res/projet-sitc2.min.png"><img src="res/<?php echo $row_rs_projet['image5_art']; ?>" alt=""></a>
            </div>
        </div>
    </div>
    <!--------------------- FOOTER ---------------->
    <?php
mysql_free_result($rs_projet);
?>
    