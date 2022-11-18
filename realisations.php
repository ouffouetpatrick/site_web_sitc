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

mysql_select_db($database_sitc, $sitc);
$query_rs_realisation1 = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.description_art FROM article WHERE article.id_art=11 AND article.idrub_art=4 AND article.empty2_art=0 AND article.geler_art=0";
$rs_realisation1 = mysql_query($query_rs_realisation1, $sitc) or die(mysql_error());
$row_rs_realisation1 = mysql_fetch_assoc($rs_realisation1);
$totalRows_rs_realisation1 = mysql_num_rows($rs_realisation1);

mysql_select_db($database_sitc, $sitc);
$query_rs_realisation2 = "SELECT article.id_art, article.idrub_art, article.libelle_art, article.contenu1_art, article.image1_art FROM article WHERE article.id_art IN (40,41,42,43,44,45) AND article.idrub_art=4 AND article.empty2_art=0 AND article.geler_art=0";
$rs_realisation2 = mysql_query($query_rs_realisation2, $sitc) or die(mysql_error());
$row_rs_realisation2 = mysql_fetch_assoc($rs_realisation2);
$totalRows_rs_realisation2 = mysql_num_rows($rs_realisation2);
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
    <div class="container realisations">
        <div class="row realisations-bloc-title">
            <div class="col-md-12 ">
                <h3><div class="realisation-title"><?php echo $row_rs_realisation1['libelle_art']; ?></div></h3>
                <div class="ligne-realisation-content">
                    <div class="ligne-realisation"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="realisation-texte">
                    <?php echo $row_rs_realisation1['description_art']; ?>
                </div>
            </div>
        </div>
    </div>
    <!-------------Nos réalisations------------->
    <div class="container realisation-container">
        <div class="row">
            <div class="col-md-12">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <?php do { ?>
                      <div class="col">
                        <div class="card card-projet">
                          <img src="res/<?php echo $row_rs_realisation2['image1_art']; ?>" class="card-img-top" alt="...">
                          <div class="card-body text-center">
                            <a href="master.php?page=sienea&amp;id_art=<?php echo $row_rs_realisation2['id_art']; ?>">
                              <button type="button" class="btn btn-card-projet">
                                <?php echo $row_rs_realisation2['libelle_art']; ?>                              </button>
                            </a>                          </div>
                        </div>
                          </div>
                      <?php } while ($row_rs_realisation2 = mysql_fetch_assoc($rs_realisation2)); ?></div>
            </div>
        </div>
    </div>
    <!--------------------- FOOTER ---------------->
    <?php
mysql_free_result($rs_realisation1);

mysql_free_result($rs_realisation2);
?>
    